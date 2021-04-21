<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userModel = User::find(1);
        $roleModel = Role::find(1);
        $departmentModel = Department::find(1);
        return view("OKI.admin.manageUser.manageUser", ["users" => $users], compact("roleModel", "departmentModel", "userModel"));
    }

    public function update(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
            "role_id" => "required|integer"
        ]);
        User::where("id", $request->id)->first()->update($request->only("role_id"));
        dd(User::all());
    }

    public function destroy($id)
    {
        $powerLevel = Role::where("id", auth()->user()->role_id)->first()->power_level;
        if ($powerLevel < 3)
            return back()->withStatus("มีข้อผิดพลาดเกิดขึ้น โปรดลองใหม่อีกครั้ง");
        else
        {   
            User::destroy($id);
            return back()->withStatus("ลบผู้ใช้สำเร็จ");
        }
    }
}