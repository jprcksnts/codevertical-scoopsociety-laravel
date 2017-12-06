<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function getDetails($id){
        $userDetail = UserDetail::where('user_id', $id)->first();
        return response()->json($userDetail);
    }
}
