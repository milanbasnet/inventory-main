<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        // $user = auth()->user();
        return view('public.user.index');
    }

    // public function store(Request $request){
    //     $user = auth()->user();

    //     $request->validate([
    //         'name'=>'required|min:3',
    //         'phone'=>'required|min:10',
    //         'country_id'=>'required',
    //         'address'=>'required',
    //         'email'=>'required|email|unique:users,email,'.$user->id,
    //     ]);

    //     if(!$user->hasRole('user')){
    //         return redirect()->route('user.index')->with('info','This form is for users(student) only.');
    //     }

    //     if ($request->hasFile('image')) {
    //         $fileName = $request->file('image')->getClientOriginalName();
    //         $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
    //         $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    //         $fileNameToStore = $actualFileName . time() . '.' . $fileExtension;
    //         $path = $request->file('image')->storeAs('public/users', $fileNameToStore);
      
    //         if ($user->avatar) {
    //           Storage::delete('public/users/' . basename($user->avatar));
    //         }
    //         $image_url = 'storage/users/' . $fileNameToStore;
    //       }else{
    //           $image_url = $user->avatar;
    //       }
        
    //     $user->update([
    //         'name'=>$request->name,
    //         'phone'=>$request->phone,
    //         'country_id'=>$request->country_id,
    //         'email'=>$request->email,
    //         'address'=>$request->address,
    //         'avatar'=>$image_url,
    //     ]);

    //     return redirect(route('user.index'))->with('success','Profile updated');
    // }
}
