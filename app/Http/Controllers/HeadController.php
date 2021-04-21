<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;

class HeadController extends Controller
{
    public function index()
    {
        $headRole = Role::where("name", "head")->first();
        $heads = User::where("role_id", $headRole->id)->get();
        $departmentModel = Department::find(1);
        return view("OKI.head", ["heads" => $heads, "departmentModel" => $departmentModel]);
    }
}
