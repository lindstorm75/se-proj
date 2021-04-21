<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;

class AssignController extends Controller
{
    public function index()
    {
        $headRole = Role::where("name", "head")->first();
        $subRole = Role::where("name", "subordinate")->first();
        $userRole = Role::where("name", "user")->first();
        $heads = User::where("role_id", $headRole->id)->get();
        $subs = User::where("role_id", $subRole->id)->get();
        $users = User::where("role_id", $userRole->id)->get();
        $departmentModel = Department::find(1);
        return view("OKI.admin.assign.assign", [
            "heads" => $heads,
            "subs" => $subs,
            "users" => $users,
            "departmentModel" => $departmentModel,
        ]);
    }
}
