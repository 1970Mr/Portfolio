<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);

        auth()->user()->update($validated);
        return back()->with('success', 'پروفایل با موفقیت بروزرسانی شد!');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/',
        ]);

        auth()->user()->update($validated);
        return back()->with('success', 'رمزعبور با موفقیت بروزرسانی شد!');
    }
}
