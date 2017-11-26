<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    function index() {
    	return view('register');
    }

    function insert(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|min:4',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:6'
    	]);

    	// insert user

    	$user = new User;
    	$user->name = $request['name'];
    	$user->email = $request['email'];
    	$user->password = bcrypt($request['passwords']);
    	$user->save();
    	//dd($request);
    	return redirect()->route('insertuser')->with('status', 'User successfuly inserted!');
    }

    function listUsers() {
    	$users = User::all();
    	//dd($users);
    	return view('listusers',compact('users'));
    }

    function update($user) {
    	$user = User::find($user);
    	if($user) {
    		return view('userupdate',compact('user'));
    	}
    }

    function doupdate(Request $request) {
    	//dd($request);
    	User::where('id', $request['userid'])
          ->update(['name' => $request['name'], 'email' => $request['email'], 'password' => bcrypt($request['password']) ]);

          return redirect()->route('updateuser',$request['userid'])->with('status','User updated successfuly.');
    }

    function deleteuser($userid) {
    	$user = User::find($userid);
		$user->delete();
		return redirect()->route('listusers')->with('status', 'User successfuly deleted!');
    }
}
