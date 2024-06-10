<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // Admin View Form
    public function adminView()
    {
        return view('authentication.login');
    }


    // Admin Login
    public function adminLogin(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput();
        }

        try {
            $username = $request->username;
            $password = $request->password;
            $remember = $request->has('remember');

            // Find user by email, whatsapp_no, or userId with role_type 1
            $user = User::where(function ($query) use ($username) {
                $query->where('email', $username)
                    ->orWhere('whatsapp_no', $username)
                    ->orWhere('userId', $username);
            })
                ->where('role_type', 1)
                ->first();

            if ($user && (
                Auth::attempt(['email' => $user->email, 'password' => $password], $remember) ||
                Auth::attempt(['whatsapp_no' => $user->whatsapp_no, 'password' => $password], $remember) ||
                Auth::attempt(['userId' => $user->userId, 'password' => $password], $remember)
            )) {
                return redirect()->route('admin.dashboard')->with('success', $user->name . ' has successfully logged in...');
            } else {
                return redirect()->route('admin.login')->with('error', 'Invalid login credentials');
            }
        } catch (Exception $e) {
            Log::error('Login Exception error: ' . $e->getMessage());
            return redirect()->route('admin.login')->withErrors(['error' => 'An error occurred while trying to log in']);
        }
    }
}
