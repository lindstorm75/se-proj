<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;
use Session;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::where("id", "!=", auth()->user()->id)->get();
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
        
        Session::flash("message", "แก้ไขผู้ใช้สำเร็จ");
        Session::flash("alertColor", "success");
        return back();
    }

    public function destroy($id)
    {
        $powerLevel = Role::where("id", auth()->user()->role_id)->first()->power_level;
        if ($powerLevel < 3)
        {
            Session::flash("message", "เกิดข้อผิดพลาด");
            Session::flash("alertColor", "danger");
            return back();
        }
        else
        {   
            User::destroy($id);
            Session::flash("message", "ลบผู้ใช้สำเร็จ");
            Session::flash("alertColor", "success");
            return back();
        }
    }
}