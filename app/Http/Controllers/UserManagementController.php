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
}
