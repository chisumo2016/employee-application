<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password'=> ['required'],
            'password_confirmation' => ['required','same:password'],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')->with('message',' User Password Updated Successfully');
    }
}
