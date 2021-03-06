<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class MyPasswordController extends Controller
{
    public function index(){
        return view('public.user.password.index');
    }

    public function update(Request $request){
        if (!auth()->user()) {
            return redirect()->back()->with('danger','Failed');
        }

        //check if the password is valid
        $request->validate([
            'current_password' => 'required|min:8',
            'new_password' => 'required|min:8'
        ]);

        $authUser = auth()->user();

        $currentP = $request->current_password;
        $newP = $request->new_password;
        $confirmP = $request->confirm_password;

        //If the password is incorrect
        if (!Hash::check($currentP, $authUser->password)) {
            return redirect()->route('my-password.index')->with('danger','Incorrect password');
        }

        if (!Str::of($newP)->exactly($confirmP)) {
            return redirect()->route('my-password.index')->with('danger','Password do not match');
        }

        $user = User::find($authUser->id);
        $user->password = Hash::make($newP);
        if ($user->save()) {

            if($user->hasRole('admin')){
                return redirect()->route('admin.index')->with('success','Password changed!');
            }

            return redirect()->intended(route('user.index'))->with('success','Password changed');
        }
        return redirect()->back();
    }
}
