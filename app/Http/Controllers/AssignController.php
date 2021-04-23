<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Department;
use Session;

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

    public function update(Request $request)
    {
        $sub = User::where("id", $request->sub_id)->first();
        if ($sub->update($request->only("head_id")))
        {
            Session::flash("message", "แก้ไขหัวหน้างานสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $headSubs = User::where("head_id", $request->head_id)->get();
        foreach ($headSubs as $sub)
        {
            $sub->update(["head_id" => null]);
        }
        $user = Role::where("name", "user")->first();
        if (User::where("id", $request->head_id)->first()->update(["role_id" => $user->id]))
        {
            
            Session::flash("message", "ลบหัวหน้างานสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }
}
