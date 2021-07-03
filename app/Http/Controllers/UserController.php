<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('edituser');
    }

    public function edit(User $customer)
    {
        $customer = Auth::customer();
        return view('edituser', compact('customer'));
    }

    public function update(Request $request, User $customer)
    {
        $request->validate([
            'fullName' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Congratulate! Customer has been updated successfully.');
    }
}
