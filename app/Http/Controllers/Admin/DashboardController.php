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

        return view('adminPanel.dashboard',compact('data'));
    }
}
