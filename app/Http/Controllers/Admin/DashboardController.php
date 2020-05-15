<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function registered(){

        $users = User::all();
        return view('admin.registeredUser')->with('users', $users);
    }

    public function registerEdit($id){

        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);


    }

    public function registerUpdate(Request $request, $id){

        $users = User::find($id);
        $users->name = $request->input('name');
        $users->usertype = $request->input('usertype');

        $users->update();

        return redirect('/role-register')->with('status', 'role updated');

    }

    public function registerDelete($id){

        $users = User::find($id);
        $users->delete();

        return redirect('/role-register')->with('status', 'user deleted');


    }
}
