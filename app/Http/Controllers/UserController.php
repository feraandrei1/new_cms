<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function index(){

        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);

    }

    //
    //
    //

    public function show(User $user){

        return view('admin.users.profile', [
        'user'=>$user,
        ]);
    }

    //
    //
    //

    public function update(User $user){

    $inputs = request()->validate([

    'username' => ['required', 'string', 'max:255', 'alpha_dash'],
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'email', 'max:255'],
    ]);

    if(request('avatar')){
        $inputs['avatar'] = request('avatar')->store('images');
    }

    $user->update($inputs);

    return back();

    }

    //
    //
    //

    // public function attach(User $user){

    // $user->roles()->attach(request('role'));

    // return back();

    // }

    // public function detach(User $user){

    // $user->roles()->detach(request('role'));

    // return back();

    // }

    //
    //
    //

    public function destroy_user(User $user){

        $user->delete();

        Session::flash('message11', 'User has been deleted');

        return back();

    }

    //
    //
    //

    public function create(){

        return view('admin.users.create');

    }

    //
    //
    //

    public function store(){

        $inputs = request()->validate([
            'username'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);

        auth()->user()->create($inputs);

        Session::flash('message22', 'User has been created');

        return redirect()->route('user.index');

    }

    //
    //
    //

    public function edit_user(User $user){

        return view('admin.users.edit_user', [

            'user'=>$user,

        ],);

    }

    public function update_user(User $user){

        $inputs = request()->validate([
            'username'=>'required',
            'name'=>'required',
            'email'=>'required',
            'roles'=>'required',
        ]);

        $user->username = $inputs['username'];
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->role = $inputs['roles'];

        $user->save($inputs);

        Session::flash('message3', 'User has been updated');

        return back();

    }

}