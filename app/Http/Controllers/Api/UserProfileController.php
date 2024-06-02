<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserDetail;
use App\Traits\ImageUploadTrait;
use App\Traits\ResponseCodeTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    use ResponseCodeTrait;
    use ImageUploadTrait;

    // User Basic & Personal Details (Update The data users table)
    public function userPersonalDetails(Request $request)
    {
        try {
            // user personal details
            $userPersonalDetails = $request->only([
                'name', 'email', 'whatsapp_no', 'refrence_by', 'profile_created_by_type',
                'password', 'gender', 'dob', 'age', 'birth_place', 'birth_time', 'height', 'weight', 'complexion', 'education', 'profession', 'occupation', 'religion', 'candidate_community', 'marital_status', 'physical_status', 'blood_group', 'candidate_income', 'candidates_address', 'photo', 'id_proof', 'terms_and_conditions'
            ]);

            $user = User::find($request->user_id);
            if (!$user) {
                return $this->getResponseCode(404, '', '', 'User Not Found.');
            }

            $users_image_link = "";
            if ($request->hasFile('photo')) {
                if ($user->photo) {
                    // Delete old photo
                    $this->deleteImage($user->photo);
                }
                // Upload new photo
                $userPersonalDetails['photo'] = $this->uploadImage($request->file('photo'), '/userImage');
            }


            // USER UPLOAD ID-PROOF
            $users_id_proof_link = "";
            if ($request->hasFile('id_proof')) {
                if ($user->id_proof) {
                    // Delete old ID proof
                    $this->deleteImage($user->id_proof);
                }
                // Upload new ID proof
                $userPersonalDetails['id_proof'] = $this->uploadImage($request->file('id_proof'), '/userIdProof');
            }

            if ($request->password) {
                $userPersonalDetails["password"] = Hash::make($request->password);
            }

            $user->update($userPersonalDetails);

            return $user;
        } catch (Exception $e) {
            Log::error('user Profile failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'user Profile failed. Please try again later.' . $e->getMessage());
        }
    }
    

    // User Update Data (Update the data user_details table)
    public function userProfileUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $userData = $this->userPersonalDetails($request);

            if (is_null($userData)) {
                DB::rollBack();
                return $this->getResponseCode(404, '', '', "User creation failed.");
            }

            $userOtherDetails = UserDetail::where('user_id', $request->user_id)->first();

            if (!$userOtherDetails) {
                return $this->getResponseCode(404, '', '', "Not Found User Profile");
            }


            // User Other Informations
            $userOtherDetails = $request->only([
                'if_nri', 'candidate_visa', 'address_nri_citizen',
                'father_name', 'father_profession', 'mother_name', 'mother_profession',
                'residence_type', 'gotra', 'family_community', 'family_sub_community',
                'family_address', 'brother', 'sister', 'other_family_details', 'calling_no',
                'are_you_manglik', 'partner_age_group_from', 'partner_age_group_to',
                'partner_income', 'partner_country', 'partner_state', 'partner_city',
                'partner_education', 'partner_occupation', 'partner_profession',
                'partner_manglik', 'partner_marital_status', 'astrology_matching',
                'expectation_partner_details'
            ]);


            $userOtherDetails["user_id"] = $request->user_id;


            // Update or create EmpProfileDetails
            $result = UserDetail::updateOrCreate(
                ['user_id' => $request->user_id],
                $userOtherDetails
            );
            $response = [
                'id' => $userData->id,
                'name' => $userData->name,
                'email' => $userData->email,
                'userId' => $userData->userId,
                'whatsapp_no' => $userData->whatsapp_no,
            ];

            DB::commit();
            return $this->getResponseCode(201, '', $response, 'Profile Updated Successful!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Profile Updated failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'User Profile Updated failed. Please try again later.' . $e->getMessage());
        }
    }


    // View Profile Function
    public function userProfileView(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }

        try {

            $profile = User::with('userDetail')->where('id', $request->user_id)->first();

            return $this->getResponseCode(201, '', $profile, 'View user profile details!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('User Profile showing failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'User Profile showing failed. Please try again later.' . $e->getMessage());
        }
    }
}
