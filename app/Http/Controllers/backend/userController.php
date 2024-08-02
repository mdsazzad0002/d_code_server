<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class userController extends Controller
{
    public function  index(Request $request){
        if($request->ajax()){
            $users = User::query()->where('role', 'user');
            return DataTables::of($users)
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= ' <button type="button" class="btn btn-primary form"
                                    data-toggle="modal"
                                    data-target="#modal_setup"
                                    data-title="User Edit"
                                    data-action="' . route('admin.user-list.update', $row->id) . '"
                                    data-socuce="' . route('admin.user-list.edit', $row->id) . '"
                                    data-method="put"
                                    >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                </button>';

                    $action .= '<button type="button" class="btn btn-primary view "
                                    data-toggle="modal"
                                    data-target="#modal_setup_view"
                                    data-title="View"
                                    data-socuce="' . route('admin.user-list.show', $row->id) . '"
                                    data-method="get">
                                    <i class="fa fa-eye" aria-hidden="true"></i> View
                                </button>';

                    $action .= ' <button type="button" class="btn btn-danger delete"
                                data-target="#modal_setup_delete"
                                data-action="' . route('admin.user-list.destroy', $row->id) . '"
                                 data-method="delete"
                                >
                                  <i class="fa fa-trash"></i> Delete</button>';
                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.users.index');
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
