<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStatusUpdateRequest;
use App\UserStatus;
use Illuminate\Http\Request;

class UserStatusController extends Controller
{
    public function getStatus($id){
        $response = array();

        $userStatus = UserStatus::where('user_id', $id)->first();

        $response['status'] = $userStatus;
        $response['success'] = true;
        return response()->json($response);
    }

    public function updateStatus(UserStatusUpdateRequest $request){
        $response = array();

        $userStatus = UserStatus::where('user_id', $request->user_id)->first();
        $userStatus->status = $request->status;
        $userStatus->save();

        $response['status'] = $userStatus;
        $response['success'] = true;
        return response()->json($response);
    }
}
