<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // List Of Users

    public function usersList(){
        $users = User::where('role_type',0)->paginate(10);
        return view('adminPanel.user.all',compact('users'));
    }


    // User Create Form

    public function create(){
        return view('adminPanel.user.add');
    }
}
