<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return redirect()->route('orderpage');
    }
    
    public function update(User $user)
    {
        if(Auth::user()->email == request('email')) {
            $this->validate(request(), [
                'username' => 'required',
                //'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'fullName' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $user->username = request('username');
            //$user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->fullName = request('fullName');
            $user->gender = request('gender');
            $user->phone = request('phone');
            $user->address = request('address');

            $user->save();

            return redirect()->route('orderpage');
        } else {
            $this->validate(request(), [
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed',
                'fullName' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]);

            $user->username = request('username');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));
            $user->fullName = request('fullName');
            $user->gender = request('gender');
            $user->phone = request('phone');
            $user->address = request('address');

            $user->save();

        }
    }

}
