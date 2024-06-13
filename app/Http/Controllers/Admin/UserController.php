<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                    'status'=> 'front_img'
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


    // User Edit Form

    public function edit()
    {

        $data['educations'] = Education::where('status', 'active')->get();
        $data['occupations'] = Occupation::where('status', 'active')->get();
        $data['professions'] = Professions::where('status', 'active')->get();
        $data['hobbies'] = Hobby::where('status', 'active')->get();
        $data['countries'] = DB::table('countries')->get();
        $data['states'] = DB::table('states')->get();
        $data['cities'] = DB::table('cities')->get();
        return view('adminPanel.user.edit', compact('data'));
    }


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
            'residence_type' => $request->residence_type ?? null,
            'gotra' => $request->gotra ?? null,
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
            'partner_hobbies' => json_encode($request->partner_hobbies) ?? null,

            'partner_manglik' => $request->partner_manglik ?? null,

            'partner_marital_status' => strtolower($request->partner_marital_status) ?? null,
            'partner_acccept_kid' => strtolower($request->partner_acccept_kid) ?? null,  //wit kit,without kit,any
            'partner_manglik' => $request->partner_kid_discription ?? null,


            'astrology_matching' => $request->astrology_matching ?? null,
            'expectation_partner_details' => $request->expectation_partner_details ?? null,
        ];
    }

    // Get State
    // public function getState(Request $request)
    // {
    //     try {
    //         $country_id = $request->country_id;
    //         $states = DB::table('states')->where("country_id", $country_id)->get();
    //         $html = "<option value=''>Select State</option>";
    //         foreach ($states as $state) {
    //             $html .= "<option value='$state->id'>$state->name</option>";
    //         }

    //         return response()->json(["data" => $html, "status" => true]);
    //     } catch (Exception $e) {
    //         return response()->json(["data" => $e->getMessage(), "status" => false]);
    //     }
    // }

    public function getState(Request $request)
    {
        try {
            $countryIds = $request->input('country_ids');
            $states = DB::table('states')->whereIn('country_id', $countryIds)->select('id', 'name', 'country_id')->get();
            $html = "<option value=''>Select State</option>";
            foreach ($states as $state) {
                $html .= "<option value='$state->id'>$state->name</option>";
            }

            return response()->json(["data" => $html, "status" => true]);
        } catch (Exception $e) {
            return response()->json(["data" => $e->getMessage(), "status" => false]);
        }
    }

    // Get City
    // public function getCity(Request $request)
    // {
    //     try {
    //         $state_id = $request->state_id;
    //         $cities = DB::table('cities')->where("state_id", $state_id)->get();
    //         $html = "<option value=''>Select City</option>";
    //         foreach ($cities as $city) {
    //             $html .= "<option value='$city->id'>$city->name</option>";
    //         }

    //         return response()->json(["data" => $html, "status" => true]);
    //     } catch (Exception $e) {
    //         return response()->json(["data" => $e->getMessage(), "status" => false]);
    //     }
    // }

    public function getCity(Request $request)
    {
        try {
            $stateIds = $request->input('state_ids');
            $cities = DB::table('cities')->whereIn('state_id', $stateIds)->select('id', 'name', 'state_id', 'country_id')->get();
            $html = "<option value=''>Select City</option>";
            foreach ($cities as $city) {
                $html .= "<option value='$city->id'>$city->name</option>";
            }

            return response()->json(["data" => $html, "status" => true]);
        } catch (Exception $e) {
            return response()->json(["data" => $e->getMessage(), "status" => false]);
        }
    }


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
}
