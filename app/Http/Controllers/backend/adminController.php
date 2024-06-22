<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function  index(){
        $users = User::where('role', 'admin')->orderBy('id', 'desc')->paginate(30);
        return view('backend.users.admin.index', compact('users'));
    }
}
