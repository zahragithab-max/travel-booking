<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminUserController extends Controller
{

    public function index()
    {

        $users = User::latest()->get();


        return view('admin.users', [

            'users' => $users

        ]);

    }
    public function edit($id)
{
    $user = User::findOrFail($id);

    return view('admin.user-edit', [
        'user' => $user
    ]);
}

public function update(\Illuminate\Http\Request $request, $id)
{
    $user = User::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'is_admin' => 'required|boolean',
    ]);

    $user->update($data);

    return redirect('/admin/users')
        ->with('success', 'اطلاعات کاربر با موفقیت ویرایش شد.');
}

public function destroy($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect('/admin/users')
        ->with('success', 'کاربر با موفقیت حذف شد.');
}

}