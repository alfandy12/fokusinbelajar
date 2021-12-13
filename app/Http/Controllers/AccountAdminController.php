<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = DB::table('users');
        if (request('search')) {
            $account->where('name', 'like', '%' . request('search') . '%');
        }
        $users = $account->paginate(8);
        return view('admin/account/index', [
            'accounts' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/account/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validasi
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'level' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        $newUser = new User;
        $newUser->name = $validateData['name'];
        $newUser->email =  $validateData['email'];
        $newUser->level = $validateData['level'];
        $newUser->password  = Hash::make($validateData['password']);
        $newUser->save();
        return redirect('/admin-account')->with('success', 'Data has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        //
        $account = User::find($id);
        return view('admin/account/edit', [
            'account' => $account,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        //
        $updateUser = user::find($id);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $updateUser->id,
            'level' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        
        $updateUser->name = $validateData['name'];
        $updateUser->email =  $validateData['email'];
        $updateUser->level = $validateData['level'];
        $updateUser->password  = Hash::make($validateData['password']);
        $updateUser->update();
        return redirect('/admin-account')->with('success', 'Data has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        //
        user::destroy($id);
        return redirect('/admin-account')->with('success', 'Data has been successfully deleted');
    }
}
