<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function  index(){
        $users = User::where('role', 'user')->orderBy('id', 'desc')->paginate(30);
        return view('backend.users.users.index', compact('users'));
    }

    public function create(){
        return view('backend.users.users.user_create');
    }

    public function  edit($id){
        $user = User::find($id);

        return view('backend.users.users.user_edit', compact('user'));
    }



    public function show($id){
        $user = User::find($id);

        return view('backend.users.users.user_show', compact('user'));
    }

    public function store(Request $request){
        $request->validate(
            ['name' => 'required'],
            ['email' => 'required'],
            ['password' => 'required'],
            ['password_confirmation' => 'required'],
        );

        // dd($request);
        if($request->password == $request->password_confirmation){
            $user_find =new user;

            if($user_find){
                $user_find->email = $request->email;
                $user_find->name = $request->name;
                $user_find->role = 'user';
                $user_find->email_verified_at = \Carbon\Carbon::now();
                $user_find->password = Hash::make($request->password);
                $user_find->save();
            }
        }else{
            return back();
            return 'Confirm password Not match';
        }

        return back();
    }

    public function update(Request $request, $id){
        $user_find =user::find($id);
        if($user_find){
            $user_find->email = $request->email;
            $user_find->name = $request->name;
            $user_find->save();
        }
        return back();
    }

    public function destroy( $id){
        user::find($id)->delete();
        return back();
    }



}
