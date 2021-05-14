<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }


    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back();
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back();
    }
}
