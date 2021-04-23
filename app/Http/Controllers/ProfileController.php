<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Department;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $departments = Department::all();
        return view('profile.edit', ["departments" => $departments]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        dd($request);
        $request->validate([
            "name" => "required|string",
            "department_id" => "required|string",
            "position" => "required|string"
        ]);

        $full_name = $request->name;
        $department_id = $request->department_id;
        $position = $request->position;

        if (auth()->user()->update($request->only("full_name", "department_id", "position")))
        {
            Session::flash("message", "อัปเดตบัญชีผู้ใช้สำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }

        return back();
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
