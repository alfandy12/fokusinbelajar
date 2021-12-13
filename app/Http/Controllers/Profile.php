<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    //
    public function index()
    {

        return view('user/profile');
    }
    public function edit()
    {
       
        return view('user/edit');
    }
    public function update(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,' . auth()->id()
        ]);
       
        auth()->user()->update([
            'name' => $validateData['name'],
            'email' =>  $validateData['email'],
        ]);
      
        return redirect('/my-profile')->with('success', 'Data has been successfully edited');
    }
    public function changepassword()
    {
       
        return view('user/changepassword');
    }
    public function updatepassword(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8'
        ]);

       

        // check password lama harus sama dengan input password
        if (Hash::check($validateData['old_password'], auth()->user()->getAuthPassword())) { 
            auth()->user()->update([
                'password' => Hash::make($validateData['password']),
            ]);
             return redirect('/my-profile')->with('success', 'Password has been successfully edited');
         } else {
            return back()->with('wrongOldPassword', 'the current password is incorrect. password can not be changed.');
         }
        
    }
    
    public function requestremove()
    {
        return view('user/remove');
    }
    public function remove(Request $request)
    {
        // kalo ada request password sama kaya password user sekarang
        if (Hash::check($request->password, auth()->user()->getAuthPassword())) { 
            // temuin id nya
            $user = User::find(Auth::user()->id);
            // terus logout
            Auth::logout();
            // udh gtu lakuin hapus akun
            if ($user->delete()) {
                // kembalikan ke home dengan flash
                return redirect('/')->with('removeprofile', 'Your account has been deleted!');

            }      
        } else {
            // kalo password beda kembalin sama flash
            return back()->with('wrongOldPassword', 'the current password is incorrect. account cant be deleted');
         }
      
    }
    
}
