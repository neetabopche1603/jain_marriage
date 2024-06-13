<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Test\TestRegisterReq;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UsersMedia;
use App\Traits\ImageUploadTrait;
use App\Traits\ResponseCodeTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;


class TestController extends Controller
{

    use ResponseCodeTrait;
    use ImageUploadTrait;

    // User Basic & Personal Details (Save The data users table)
    public function userPersonalDetails(TestRegisterReq $request)
    {

        try {

            // user personal details
            $userPersonalDetails = $request->only([
                'name', 'email', 'whatsapp_no', 'refrence_by', 'profile_created_by_type',
                'password', 'gender', 'dob', 'age', 'birth_place', 'birth_time', 'height', 'weight', 'complexion', 'education', 'profession', 'occupation', 'religion', 'candidate_community', 'marital_status', 'is_children', 'son_details', 'daughter_details', 'physical_status', 'physical_status_desc',
                'blood_group', 'candidate_income', 'candidates_address', 'id_proof', 'terms_and_conditions', 'hobbies', 'idProof_type'
            ]);


            // USER UPLOAD ID-PROOF
            $users_id_proof_link = "";
            if ($request->has("id_proof")) {
                $users_id_proof_link = $this->uploadImage($request->file('id_proof'), '/userIdProof');
                $userPersonalDetails["id_proof"] = $users_id_proof_link;
            }

            $userId = $this->generateUniqueUserId();
            $userPersonalDetails["userId"] = $userId;

            $userPersonalDetails["password"] = Hash::make($request->password);
            // $userPersonalDetails["hobbies"] = json_encode($request->hobbies);

            $userPersonalDetails["education"] = json_encode($request->education);

            $user = User::create($userPersonalDetails);

            return $user;
        } catch (Exception $e) {
            Log::error('register failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'register failed. Please try again later.' . $e->getMessage());
        }
    }

    // User Register Data (Save the data user_details table)
    public function userRegister(TestRegisterReq $request)
    {
        DB::beginTransaction();
        try {

            $userData = $this->userPersonalDetails($request);

            if (is_null($userData)) {
                DB::rollBack();
                return $this->getResponseCode(404, '', '', "User creation failed.");
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
                'partner_manglik', 'partner_marital_status', 'partner_acccept_kid', 'partner_kid_discription',
                'astrology_matching',
                'expectation_partner_details', 'partner_hobbies', 'photo',

            ]);


            $userOtherDetails["user_id"] = $userData->id;

            // $userOtherDetails["partner_hobbies"] = json_encode($request->partner_hobbies);
            $userOtherDetails["partner_country"] = json_encode($request->partner_country, true);
            $userOtherDetails["partner_state"] = json_encode($request->partner_state, true);
            $userOtherDetails["partner_city"] = json_encode($request->partner_city, true);
            $userOtherDetails["partner_education"] = json_encode($request->partner_education, true);
            $userOtherDetails["partner_occupation"] = json_encode($request->partner_occupation, true);
            $userOtherDetails["partner_profession"] = json_encode($request->partner_profession, true);

            // dd($userOtherDetails);

            $userInformations = UserDetail::create($userOtherDetails);

            // Upload User Image (Multiple)
            foreach ($request->file('photo') as $photo) {
                // Upload the image
                $imagePath = Storage::disk('public')->put('userImage', $photo);

                // Concatenate the storage directory path with the image path
                $fullImagePath = 'storage/' . $imagePath;

                // Save the full image path to the user_media table
                UsersMedia::create([
                    'user_id' => $userData->id,
                    'photo' => $fullImagePath,
                ]);
            }


            $token = JWTAuth::fromUser($userData);

            $response = [
                'id' => $userData->id,
                'name' => $userData->name,
                'email' => $userData->email,
                'userId' => $userData->userId,
                'whatsapp_no' => $userData->whatsapp_no,
            ];

            // Fire the UserRegistered event
            // event(new UserRegisteredEvent($userData));
            DB::commit();
            return $this->getResponseCode(200,  $token, $response, 'Register Successfully Done!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('register failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'register failed. Please try again later.' . $e->getMessage());
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



    // Get countries


    public function getcountries()
    {
        try {
            $countries = DB::table('countries')->select('id', 'name', 'iso3')->get();

            return $this->getResponseCode(201, '', $countries, 'Get countries!');
        } catch (Exception $e) {
            Log::error('get-countries failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'get-countries  failed. Please try again later.' . $e->getMessage());
        }
    }



    // Get States By Country
    public function getStatesByCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_ids' => 'required|array',
            'country_ids.*' => 'exists:countries,id',
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }
        try {

            $countryIds = $request->input('country_ids');
            $states = DB::table('states')->whereIn('country_id', $countryIds)->select('id', 'name', 'iso2','country_id')->get();

            return $this->getResponseCode(201, '', $states, 'Get states!');
        } catch (Exception $e) {
            Log::error('get-states failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'get-states  failed. Please try again later.' . $e->getMessage());
        }
    }

    //get Cities By State
    public function getCitiesByState(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'state_ids' => 'required|array',
            'state_ids.*' => 'exists:states,id',
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }

        try {
            $stateIds = $request->input('state_ids');
            $cities = DB::table('cities')->whereIn('state_id', $stateIds)->select('id', 'name','state_id','country_id')->get();

            return $this->getResponseCode(201, '', $cities, 'Get Cities!');
        } catch (Exception $e) {
            Log::error('get-Cities failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'get-Cities  failed. Please try again later.' . $e->getMessage());
        }
    }




}
