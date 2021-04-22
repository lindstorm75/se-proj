<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OkrRequest;
use App\User;
use App\Okr;

class OkrRequestController extends Controller
{
    public function index()
    {
        $okrRequests = OkrRequest::all();
        $userModel = User::find(1);
        $okrModel = Okr::find(1);
        return view("OKI.admin.okrRequests.waiting", ["data" => $okrRequests, "userModel" => $userModel, "okrModel" => $okrModel]);
    }
}
