<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {

        $data['total_users'] = User::where('role_type',0)->count();
        $data['total_active_users'] = User::where('role_type',0)->count();
        $data['total_trashed_users'] = User::onlyTrashed()->where('role_type', 0)->count();
        $data['total_profile_verify_users'] = User::where(['role_type'=>0,'profile_status'=>'verified'])->count();
        $data['total_profile_verify_pending'] = User::where(['role_type'=>0,'profile_status'=>'pending'])->count();

        $data['total_profile_verify_rejected'] = User::where(['role_type'=>0,'profile_status'=>'rejected'])->count();


        return view('adminPanel.dashboard',compact('data'));
    }

}
