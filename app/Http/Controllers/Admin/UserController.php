<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfile\PartnerPreferenceReq;
use App\Http\Requests\UserProfile\UserFamilyDetailReq;
use App\Http\Requests\UserProfile\UserPersonalRequest;
use App\Http\Requests\UserReq;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Occupation;
use App\Models\Professions;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UsersMedia;
use App\Traits\ImageUploadTrait;
use PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    use ImageUploadTrait;
    // List Of Users

    public function usersList()
    {
        $users = User::where('role_type', 0)->paginate(10);
        return view('adminPanel.user.all', compact('users'));
    }

// Soft delete(List Of users)
    public function deletedUsersList()
    {
        $users = User::where('role_type', 0)->onlyTrashed()->paginate(10);
        return view('adminPanel.user.delete_userList', compact('users'));
    }


    // User Create Form
    public function create()
    {
        $data['educations'] = Education::where('status', 'active')->get();
        $data['occupations'] = Occupation::where('status', 'active')->get();
        $data['professions'] = Professions::where('status', 'active')->get();
        $data['hobbies'] = Hobby::where('status', 'active')->get();
        $data['countries'] = DB::table('countries')->get();
        // $data['states'] = DB::table('states')->get();
        // $data['cities'] = DB::table('cities')->get();

        return view('adminPanel.user.add', compact('data'));
    }

    // User Store
    public function store(UserReq $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {

            $userPersonalData = $this->userPersonalDetails($request);

            $userId = $this->generateUniqueUserId();
            $userPersonalData['userId'] = $userId;
            $userPersonalData['created_by'] = Auth::id();
            $userPersonalData['idProof_type'] = $request->idProof_type;

            // USER UPLOAD ID-PROOF
            if ($request->has('id_proof')) {
                $userPersonalData['id_proof'] = $this->uploadImage($request->file('id_proof'), '/userIdProof');
            }

            // Save the data to users table
            $user = User::create($userPersonalData);

            // Save the data to user details table
            $userOtherDetails = $this->userOtherDetails($request);
            $userOtherDetails['user_id'] = $user->id;
            $userDetailData =  UserDetail::create($userOtherDetails);

            // Upload and Store Cropped Image
            if ($request->has('photo')) {
                $base64Image = $request->croppedImage;
                $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

                $fileName = uniqid('image_') . '.jpg';

                // Storage directory
                $storagePath = storage_path('app/public/userImage/');

                // Save image file to storage
                file_put_contents($storagePath . $fileName, $image);

                // Save image path to database
                UsersMedia::create([
                    'user_id' => $user->id,
                    'photo' => 'storage/userImage/' . $fileName,
                    'status' => 'front_img'
                ]);
            }


            // Save the data to users_media table
            // $this->saveUserMedia($request->file('photo'), $user->id);

            DB::commit();
            return Redirect::route('admin.users')->with('success', "User Details Added Successfully!");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Details store failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User Details store failed: ' . $e->getMessage());
        }
    }

    // userPersonalDetails Array
    public function userPersonalDetails(Request $request)
    {
        return [
            'name' => $request->name ?? null,
            'email' => $request->email ?? null,
            'email_verified_at' => now(),
            'whatsapp_no' => $request->whatsapp_no ?? null,
            'refrence_by' => $request->refrence_by ?? null,
            'profile_created_by_type' => $request->profile_created_by_type ?? null,
            'password' => Hash::make($request->password) ?? null,
            'userId' => $request->userId ?? null,
            'gender' => $request->gender ?? null,
            'dob' => $request->dob ?? null,
            'age' => $request->age ?? null,
            'birth_place' => $request->birth_place ?? null,
            'birth_time' => $request->birth_time ?? null,
            'height' => $request->height ?? null,
            'weight' => $request->weight ?? null,
            'complexion' => $request->complexion ?? null,
            'education' => json_encode($request->education) ?? null,
            'education_desc' => $request->education_desc ?? null,
            'profession' => $request->profession ?? null,
            'occupation' => $request->occupation ?? null,
            'hobbies' => $request->hobbies ?? null,
            'religion' => $request->religion ?? null,
            'candidate_community' => $request->candidate_community ?? null,

            'marital_status' => strtolower($request->marital_status) ?? null,
            'is_children' => strtolower($request->is_children) ?? null, //Yes Or No
            'son_details' => $request->son_details ?? null,
            'daughter_details' => $request->daughter_details ?? null,

            'physical_status' => strtolower($request->physical_status) ?? null,  //Yes Or No
            'physical_status_desc' => $request->physical_status_desc ?? null,


            'blood_group' => $request->blood_group ?? null,
            'drinking' => $request->drinking ?? null,
            'smoking' => $request->smoking ?? null,
            'disability' => $request->disability ?? null,
            'language' => $request->language ?? null,
            'candidate_income' => $request->candidate_income ?? null,
            'candidates_about' => $request->candidates_about ?? null,
            'candidates_address' => $request->candidates_address ?? null,
            'profile_status' => $request->profile_status ?? 'pending',
            'profile_rejected_reason' => $request->profile_rejected_reason ?? null,
            'account_status' => $request->account_status ?? 'active',
            'created_by' => $request->created_by ?? Auth::id(),
            'terms_and_conditions' => $request->terms_and_conditions ?? 1,
        ];
    }

    // userOtherDetails Array
    public function userOtherDetails(Request $request)
    {
        return [
            'if_nri' => strtolower($request->if_nri) ?? null,
            'candidate_visa' => $request->candidate_visa ?? null,
            'address_nri_citizen' => $request->address_nri_citizen ?? null,
            'father_name' => $request->father_name ?? null,
            'father_profession' => $request->father_profession ?? null,
            'mother_name' => $request->mother_name ?? null,
            'mother_profession' => $request->mother_profession ?? null,
            'residence_type' => strtolower($request->residence_type) ?? null,
            'gotra' => $request->gotra ?? null,
            'family_status' => $request->family_status ?? null,
            'family_type' => $request->family_type ?? null,
            'family_community' => $request->family_community ?? null,
            'family_sub_community' => $request->family_sub_community ?? null,
            'family_address' => $request->family_address ?? null,
            'brother' => $request->brother ?? null,
            'sister' => $request->sister ?? null,
            'other_family_details' => $request->other_family_details ?? null,
            'calling_no' => $request->calling_no ?? null,
            'are_you_manglik' => $request->are_you_manglik ?? null,
            'partner_age_group_from' => $request->partner_age_group_from ?? null,
            'partner_age_group_to' => $request->partner_age_group_to ?? null,
            'partner_income' => $request->partner_income ?? null,

            'partner_country' => json_encode($request->partner_country) ?? null,
            'partner_state' => json_encode($request->partner_state) ?? null,
            'partner_city' => json_encode($request->partner_city) ?? null,
            'partner_education' => json_encode($request->partner_education) ?? null,
            'partner_education_desc' => json_encode($request->partner_education_desc) ?? null,
            'partner_occupation' => json_encode($request->partner_occupation) ?? null,
            'partner_profession' => json_encode($request->partner_profession) ?? null,

            'partner_manglik' => $request->partner_manglik ?? null,

            'partner_marital_status' => strtolower($request->partner_marital_status) ?? null,
            'partner_acccept_kid' => strtolower($request->partner_acccept_kid) ?? null,  //wit kit,without kit,any
            'partner_kid_discription' => $request->partner_kid_discription ?? null,


            'astrology_matching' => $request->astrology_matching ?? null,
            'expectation_partner_details' => $request->expectation_partner_details ?? null,
        ];
    }


    // Get States
    public function getState(Request $request)
    {
        try {
            $countryIds = $request->input('country_ids');
            $states = DB::table('states')->whereIn('country_id', $countryIds)->select('id', 'name', 'country_id')->get();
            $html = "<option value=''>Select State</option>";
            $html .= "<option value='0'>Any</option>";
            foreach ($states as $state) {
                $html .= "<option value='$state->id'>$state->name</option>";
            }

            return response()->json(["data" => $html, "status" => true]);
        } catch (Exception $e) {
            return response()->json(["data" => $e->getMessage(), "status" => false]);
        }
    }


    // GetCity
    public function getCity(Request $request)
    {
        try {
            $stateIds = $request->input('state_ids');
            $cities = DB::table('cities')->whereIn('state_id', $stateIds)->select('id', 'name', 'state_id', 'country_id')->get();
            $html = "<option value=''>Select City</option>";
            $html .= "<option value='0'>Any</option>";
            foreach ($cities as $city) {
                $html .= "<option value='$city->id'>$city->name</option>";
            }

            return response()->json(["data" => $html, "status" => true]);
        } catch (Exception $e) {
            return response()->json(["data" => $e->getMessage(), "status" => false]);
        }
    }


    // User Personal Details Edit Form

    public function edit($id)
    {
        try {
            $usersEdit = User::with('userDetail')->find($id);
            $usersEdit->education = json_decode($usersEdit->education, true);

            $data['educations'] = Education::where('status', 'active')->orderBy("education_name", "asc")->get();
            $data['occupations'] = Occupation::where('status', 'active')->get();
            $data['professions'] = Professions::where('status', 'active')->get();

            return view('adminPanel.user.editUser_personal_detail', compact('data', 'usersEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // User Family Details Edit Form
    public function editFamily($id)
    {
        try {
            $usersEdit = User::with('userDetail')->find($id);
            $data['professions'] = Professions::where('status', 'active')->get();

            return view('adminPanel.user.editFamilyDetail', compact('data', 'usersEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // User Partner Preferance Details Edit Form
    public function editPartner($id)
    {
        try {
            $usersEdit = User::with('userDetail')->find($id);
            $usersEdit->education = json_decode($usersEdit->education, true);

            $data['educations'] = Education::where('status', 'active')->orderBy("education_name", "asc")->get();
            $data['occupations'] = Occupation::where('status', 'active')->get();
            $data['professions'] = Professions::where('status', 'active')->get();
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            $data['cities'] = DB::table('cities')->get();

            $data['professions'] = Professions::where('status', 'active')->get();
            return view('adminPanel.user.editPartnerPreference', compact('data', 'usersEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // User Partner Preferance Details Edit Form
    public function editVerifyDocument($id)
    {
        try {
            $usersEdit = User::with('userDetail')->find($id);
            return view('adminPanel.user.editDocument', compact('usersEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // User Image Details Edit Form
    public function editUserPhotoUpload($id)
    {
        try {
            $usersEdit = User::find($id);
            $usersMedia = UsersMedia::where('user_id', $id)->first();
            $userMedias = UsersMedia::where('user_id', $id)->get();
            return view('adminPanel.user.userPhoto', compact('usersEdit', 'usersMedia', 'userMedias'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    // Basic & Personal Update Details

    public function userBasicPersonalDetailUpdate(UserPersonalRequest $request)
    {
        DB::beginTransaction();
        try {
            $userPersonalDetails = $request->only([
                'name', 'email', 'whatsapp_no', 'refrence_by', 'profile_created_by_type',
                'password', 'gender', 'dob', 'age', 'birth_place', 'birth_time', 'height', 'weight', 'complexion', 'education', 'profession', 'occupation', 'religion', 'candidate_community', 'marital_status', 'is_children', 'son_details', 'daughter_details', 'physical_status', 'physical_status_desc',
                'blood_group', 'candidate_income', 'candidates_address',
            ]);

            //  If NRI-
            $nriData = $request->only([
                'if_nri', 'candidate_visa', 'address_nri_citizen'
            ]);


            if (!empty($userPersonalDetails['password'])) {
                $userPersonalDetails['password'] = Hash::make($userPersonalDetails['password']);
            } else {
                $userPersonalDetails = Arr::except($userPersonalDetails, array('password'));
            }

            // Update Data Users table
            $users = User::find($request->user_id);

            $users->update($userPersonalDetails);

            // Update UserDetails Table
            $userDetails = UserDetail::where('user_id', $request->user_id)->first();
            $userDetails->update($nriData);

            DB::commit();
            return Redirect::back()->with('success', "User Basic and Personal Details update Successfully!");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Basic and Personal update failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User Basic and Personal update failed: ' . $e->getMessage());
        }
    }


    // Family Details Update
    public function userFamilyDetailsUpdate(UserFamilyDetailReq $request)
    {

        DB::beginTransaction();
        try {

            $userFamilyDetails = $request->only([
                'father_name', 'father_profession', 'mother_name', 'mother_profession', 'residence_type',
                'gotra', 'family_status', 'family_type', 'family_community', 'family_sub_community', 'family_address', 'brother', 'sister', 'other_family_details', 'calling_no', 'are_you_manglik',
            ]);



            // Update UserDetails Table
            $userDetails = UserDetail::where('user_id', $request->user_id)->first();
            $userDetails->update($userFamilyDetails);

            DB::commit();
            return Redirect::back()->with('success', "User Family Details update Successfully!");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Family update failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User Family update failed: ' . $e->getMessage());
        }
    }

    // Partner Preference Update
    public function userPartnerPreferenceDetailsUpdate(PartnerPreferenceReq $request)
    {

        DB::beginTransaction();
        try {

            $userPartnerPrefDetails = $request->only([
                'partner_age_group_from', 'partner_age_group_to', 'partner_income', 'partner_country', 'partner_state', 'partner_city', 'partner_education', 'partner_occupation', 'partner_profession', 'partner_manglik', 'partner_marital_status', 'partner_acccept_kid', 'partner_kid_discription', 'astrology_matching', 'expectation_partner_details'
            ]);

            // Update UserDetails Table
            $userDetails = UserDetail::where('user_id', $request->user_id)->first();
            $userDetails->update($userPartnerPrefDetails);

            DB::commit();
            return Redirect::back()->with('success', "User Partner Preference Details update Successfully!");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Partner Preference update failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User Partner Preference update failed: ' . $e->getMessage());
        }
    }


    // Update Document and verification status update
    public function userDocumentUpdate(Request $request)
    {
        $this->validate($request, [
            'idProof_type' => 'required',
            'id_proof' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);

        DB::beginTransaction();
        try {
            $userDetails = User::find($request->user_id);

            if (!$userDetails) {
                return Redirect::back()->with('error', 'User not found.');
            }

            //ID proof upload
            if ($request->hasFile('id_proof')) {
                // Delete old ID proof if exists
                if ($userDetails->id_proof) {
                    $this->deleteImage($userDetails->id_proof);
                }

                // Upload new ID proof
                $id_proofsave = $this->uploadImage($request->file('id_proof'), '/userIdProof');
                $userDetails->id_proof = $id_proofsave;
            }

            // Update user details
            $userDetails->idProof_type = $request->idProof_type;
            $userDetails->update();

            DB::commit();
            return Redirect::back()->with('success', "User Partner Document uploaded successfully!");
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Document upload failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User Document upload update failed: ' . $e->getMessage());
        }
    }


    // Account status update
    public function userAccountStatusUpdate($id)
    {
        $userAccStatus = User::find($id);
        $userAccStatus->account_status = $userAccStatus->account_status == 'active' ? 'inactive' : 'active';
        $userAccStatus->update();
        return Redirect::back()->with('success',  $userAccStatus->name . ' Account status has been updated.');
    }


    public function userVerificationDocStatusUpdate(Request $request)
    {
        $this->validate($request, [
            'profile_status' => 'nullable|in:pending,verified,rejected',
            'profile_rejected_reason' => 'required_if:profile_status,rejected',
        ], [
            'profile_rejected_reason.required_if' => 'The rejection reason is required when the profile status is rejected.',
        ]);

        DB::beginTransaction();
        try {
            $userVerificationStatus = User::find($request->user_id);

            if (!$userVerificationStatus) {
                return Redirect::back()->with('error', 'User not found.');
            }

            // Update the profile status and rejection reason if applicable
            if ($request->has('profile_status')) {
                $userVerificationStatus->profile_status = $request->profile_status;
                if ($request->profile_status == 'rejected') {
                    $userVerificationStatus->profile_rejected_reason = $request->profile_rejected_reason;
                } else {
                    $userVerificationStatus->profile_rejected_reason = null;
                }
            }

            $userVerificationStatus->save();

            DB::commit();
            return Redirect::back()->with('success', 'Document verification status for ' . $userVerificationStatus->name . ' has been updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User verification status update failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'User verification status update failed: ' . $e->getMessage());
        }
    }


    // Upload Image Update
    public function uploadUserImageUpdate(Request $request)
    {
        // Validate request inputs
        $this->validate($request, [
            'user_id' => 'required|exists:users,id',
            'croppedImage' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $users = User::find($request->user_id);

            if (!$users) {
                return Redirect::back()->with('error', 'User not found.');
            }

            // Check if the request has a photo
            if ($request->has('croppedImage')) {
                $base64Image = $request->croppedImage;
                $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

                $fileName = uniqid('image_') . '.jpg';

                // Storage directory
                $storagePath = storage_path('app/public/userImage/');

                // Ensure the directory exists
                if (!is_dir($storagePath)) {
                    mkdir($storagePath, 0755, true);
                }

                // Save image file to storage
                file_put_contents($storagePath . $fileName, $image);

                // Save image path to database
                UsersMedia::create([
                    'user_id' => $users->id,
                    'photo' => 'storage/userImage/' . $fileName,
                    'status' => 'front_img',
                ]);
            }

            DB::commit();
            return Redirect::back()->with('success', 'Photo uploaded successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Photo upload update failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'Photo upload update failed: ' . $e->getMessage());
        }
    }

    // Delete Image
    public function userPhotoDelete($id)
    {
        DB::beginTransaction();
        try {


            $userMediaDelete = UsersMedia::find($id);

            if ($userMediaDelete) {

               $imagePath = public_path($userMediaDelete->photo);

                // Check if the file exists and delete it
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $userMediaDelete->delete();
            } else {
                return Redirect::back()->with('error', 'Photo not found.');
            }

            DB::commit();
            return Redirect::back()->with('success', 'Photo deleted successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Photo delete failed: ' . $e->getMessage());
            return Redirect::back()->with('error', 'Photo delete failed: ' . $e->getMessage());
        }
    }


    // View User Profile
    public function userViewProfilePage($id)
    {
        try {
            $data['userProfile'] = User::with('userDetail', 'userMedia')->find($id);
            $data['countries'] = DB::table('countries')->get();
            $data['states'] = DB::table('states')->get();
            $data['cities'] = DB::table('cities')->get();

            return view('adminPanel.user.userDetail_view', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


  // User SoftDelete data
  public function userSoftDeleteData($id)
  {
      DB::beginTransaction();
      try {
          $userDelete = User::find($id);

          if (!$userDelete) {
              return Redirect::back()->with('error', 'User not found.');
          }

          $userDelete->delete();

          DB::commit();
          return Redirect::back()->with('success', 'User moved to trash successfully.');
      } catch (\Exception $e) {
          DB::rollBack();
          Log::error('User soft delete failed: ' . $e->getMessage());
          return Redirect::back()->with('error', 'User soft delete failed: ' . $e->getMessage());
      }
  }



   // User HardDelete data (Permanently Delete)
   public function userHardDeleteData($id)
   {
       DB::beginTransaction();
       try {
        $userDelete = User::onlyTrashed()->find($id);

           if (!$userDelete) {
               return Redirect::back()->with('error', 'User not found.');
           }

           $userDelete->forceDelete();

           DB::commit();
           return Redirect::back()->with('success', 'User Details Permantely Delete successfully.');
       } catch (\Exception $e) {
           DB::rollBack();
           Log::error('User Hard delete failed: ' . $e->getMessage());
           return Redirect::back()->with('error', 'User Hard delete failed: ' . $e->getMessage());
       }
   }



    // View user pdf
    public function userPdfView()
    {
        return view('pdf.userPdf');
    }





    // Generate PDF
    public function generatePdf()
    {

        $usersDetails = User::with('userDetail')->where('role_type', 0)->get();

        $data = [
            'usersDetails' => $usersDetails
        ];

        $pdf = PDF::loadView('pdf.userPdf', $data);

        // Generate the PDF
        $pdfFile = $pdf->output();

        return response()->stream(
            function () use ($pdfFile) {
                echo $pdfFile;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="jain_E_Patrika.pdf"',
            ]
        );
    }




    // generateUniqueUserId
    private function generateUniqueUserId($prefix = 'JEP', $length = 5)
    {
        $numericPart = '';

        // Generate a random numeric part
        for ($i = 0; $i < $length; $i++) {
            $numericPart .= mt_rand(0, 9);
        }
        // Combine prefix with numeric part
        return $prefix . $numericPart;
    }

    // User Media Private Function
    private function saveUserMedia($photos, $userId)
    {
        foreach ($photos as $photo) {
            // Upload the image
            $imagePath = Storage::disk('public')->put('userImage', $photo);

            // Concatenate the storage directory path with the image path
            $fullImagePath = 'storage/' . $imagePath;

            // Save the full image path to the user_media table
            UsersMedia::create([
                'user_id' => $userId,
                'photo' => $fullImagePath,
            ]);
        }
    }
}
