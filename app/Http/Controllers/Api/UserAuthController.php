<?php

namespace App\Http\Controllers\Api;

use App\Events\UserRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
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


class UserAuthController extends Controller
{

    use ResponseCodeTrait;
    use ImageUploadTrait;

    // User Basic & Personal Details (Save The data users table)
    public function userPersonalDetails(RegisterRequest $request)
    {
        try {

            // $prefix = 'JEP';
            // $date = now()->format('Ymd');
            // $randomString = Str::upper(Str::random(4));

            // user personal details
            $userPersonalDetails = $request->only([
                'name', 'email', 'whatsapp_no', 'refrence_by', 'profile_created_by_type',
                'password', 'gender', 'dob', 'age', 'birth_place', 'birth_time', 'height', 'weight', 'complexion', 'education', 'profession', 'occupation', 'religion', 'candidate_community', 'marital_status', 'physical_status', 'blood_group', 'candidate_income', 'candidates_address', 'id_proof', 'terms_and_conditions', 'hobby'
            ]);

            //  USER UPLOAD PHOTO

            // $users_image_link = "";
            // if ($request->has("photo")) {
            //     $users_image_link = $this->uploadImage($request->file('photo'), '/userImage');
            //     $userPersonalDetails['photo'] = $users_image_link;
            // }

            // $users_image_link = "";
            // if ($request->has("photo")) {
            //     // Define the cropping data
            //     $cropData = [
            //         'photo_width' => 300,
            //         'photo_height' => 300,
            //         'photo_x' => 50,
            //         'photo_y' => 50,
            //     ];

            //     // Call the uploadImage method with the cropping data
            //     $users_image_link = $this->uploadImage($request->file('photo'), '/userImage', null, $cropData);
            //     $userPersonalDetails['photo'] = $users_image_link;
            // }

            // USER UPLOAD ID-PROOF
            $users_id_proof_link = "";
            if ($request->has("id_proof")) {
                $users_id_proof_link = $this->uploadImage($request->file('id_proof'), '/userIdProof');
                $userPersonalDetails["id_proof"] = $users_id_proof_link;
            }

            // $users_id_proof_link = "";
            // if ($request->has("id_proof")) {
            //     // Define the cropping data
            //     $cropData = [
            //         'id_proof_width' => 300,
            //         'id_proof_height' => 300,
            //         'id_proof_x' => 50,
            //         'id_proof_y' => 50,
            //     ];

            //     // Call the uploadImage method with the cropping data
            //     $users_id_proof_link = $this->uploadImage($request->file('id_proof'), '/userIdProof', null, $cropData);
            //     $userPersonalDetails['id_proof'] = $users_id_proof_link;
            // }

            $userId = $this->generateUniqueUserId();
            $userPersonalDetails["userId"] = $userId;

            $userPersonalDetails["password"] = Hash::make($request->password);;

            if ($request->has('user_id') && $request->user_id != null) {
                $user = User::find($request->user_id);
                if (!$user) {
                    return null;
                }
                $user->update($userPersonalDetails);
            } else {
                $user = User::create($userPersonalDetails);
            }

            return $user;
        } catch (Exception $e) {
            Log::error('register failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'register failed. Please try again later.' . $e->getMessage());
        }
    }

    // User Register Data (Save the data user_details table)
    public function userRegister(RegisterRequest $request)
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
                'partner_manglik', 'partner_marital_status', 'astrology_matching',
                'expectation_partner_details', 'partner_hobby', 'photo',
            ]);


            $userOtherDetails["user_id"] = $userData->id;

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
            event(new UserRegisteredEvent($userData));
            DB::commit();
            return $this->getResponseCode(200,  $token, $response, 'Register Successfully Done!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('register failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'register failed. Please try again later.' . $e->getMessage());
        }
    }


    // User Login Function
    public function userLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }

        try {

            $username = $request->username;
            $password = $request->password;

            $user = User::where('email', $username)
                ->orWhere('whatsapp_no', $username)
                ->orWhere('userId', $username)
                ->first();

            if (!$user) {
                return $this->getResponseCode(401, '', '', "Username wrong please fill the right username");
            }

            // Check if the user is a superadmin
            if ($user->role_type == 1) {
                return $this->getResponseCode(403, '', '', 'Access denied for this user.');
            }

            if (!Hash::check($request->password, $user->password)) {
                return $this->getResponseCode(401, '', '', 'Invalid Password.');
            }

            $credentials = [
                'email' => $username,
                'password' => $password,
            ];


            if (
                Auth::attempt(['email' => $username, 'password' => $password])
                || Auth::attempt(['whatsapp_no' => $username, 'password' => $password])
                || Auth::attempt(['userId' => $username, 'password' => $password])
            ) {

                $token = JWTAuth::attempt($credentials);

                if (!$token) {
                    return $this->getResponseCode(401, '', '', 'Invalid credentials');
                }

                $response = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'userId' => $user->userId,
                    'whatsapp_no' => $user->whatsapp_no,
                ];

                return $this->getResponseCode(200, $token, $response, 'Login Successfully!');
            } else {
                return $this->getResponseCode(401, '', '', 'Invalid credentials');
            }
        } catch (Exception $e) {
            Log::error('User Login failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'User Login failed. Please try again later.' . $e->getMessage());
        }
    }

    // Forgot Password
    public function forgotPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }

        DB::beginTransaction();

        try {

            // Check user
            $user = User::where('email', $request->email)->first();

            $token = Hash::make($user->email . Str::random(10) . Carbon::now()->timestamp);
            $encodedToken = base64_encode($token);

            // Set expiration time
            $expiresAt = Carbon::now()->addHours(24);

            // Insert the token into the password reset table
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                [
                    'email' => $user->email,
                    'token' => $encodedToken,
                    'created_at' => Carbon::now(),
                    'expired_at' => $expiresAt,
                ]
            );

            // reset-link url
            $resetUrl = 'http://127.0.0.1:8000/reset-password?token=' . urlencode($encodedToken);

            // Send Mail for User reset-password link
            $mailData = [
                'mail_title' => 'Password Reset Request',
                'name' => $user->name,
                'email' => $user->email,
                'password_reset_link' => $resetUrl,
            ];

            // Send the email
            Mail::to($request->email)->send(new ResetPasswordMail($mailData));

            DB::commit();
            return $this->getResponseCode(201, '', $mailData, 'Reset password link sent to your email successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Forgot password failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'Forgot password failed. Please try again later.');
        }
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return $this->getResponseCode(422, '', [], $validator->errors()->all());
        }

        DB::beginTransaction();
        try {

            // Check for valid reset token
            $resetRecord = DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->first();
            if (!$resetRecord) {
                return $this->getResponseCode(404, '', '', 'Token not found. Please generate the reset password link again.');
            }

            // Check if the token is expired
            if (Carbon::parse($resetRecord->expired_at)->isPast()) {
                // Delete expired token
                DB::table('password_reset_tokens')->where('token', $request->token)->delete();
                DB::commit();
                return $this->getResponseCode(410, '', '', 'Reset Password Link Invaild Or Expired.');
            }

            // Check user
            $user = User::where('email', $resetRecord->email)->firstOrFail();

            if (!$user) {
                return $this->getResponseCode(404, '', '', 'User Not Found.!');
            }

            // Update the user's password
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // Delete the token after successful password reset
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            DB::commit();
            return $this->getResponseCode(200, '', '', 'Password successfully reset.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Password reset failed: ' . $e->getMessage());
            return $this->getResponseCode(500, '', '', 'Password reset failed. Please try again later.');
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
}
