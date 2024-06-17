<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display the user's profile form.
     */
    public function editProfileView(Request $request)
    {
        $user = $request->user();
        return view('adminPanel.profile', compact('user'));
    }

    /**
     * Update the user's profile information.
     */

    public function update_profile(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
            'whatsapp_no' => ['string', Rule::unique(User::class)->ignore($request->user()->id)],
            'candidates_address' => 'nullable',
            'photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ]);

        // Retrieve the authenticated user
        $user = $request->user();

        // Update user details from request
        $user->fill($request->except(['_token', 'photo', 'id_proof', 'idProof_type']));

        // Check if email has changed to reset email_verified_at
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Handle photo upload if provided
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo) {
                $this->deleteImage($user->photo);
            }
            // Upload new photo
            $photoPath = $this->uploadImage($request->file('photo'), '/userImage');
            $user->photo = $photoPath;
        }

        $user->update();

        return Redirect::route('admin.editProfileView')->with('success', 'Profile updated successfully.');
    }


    public function update_password(Request $request) {

        $validated = $request->validate([
            'current_password' => ['required', 'current_password','sometimes'],
            'password' => ['required', Password::defaults(), 'confirmed','sometimes'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $request->user()->save();

        return Redirect::route('admin.editProfileView')->with('success', 'Password updated');
    }


}
