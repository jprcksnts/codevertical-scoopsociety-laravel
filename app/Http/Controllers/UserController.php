<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSignupRequest;
use App\User;
use App\UserDetail;
use App\UserStatus;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $response = array();

        $user = User::find($request->id);
        $userDetail = UserDetail::where('user_id', $request->id)->first();
        $userStatus = UserStatus::where('user_id', $request->id)->first();

        $response['user'] = $user;
        $response['user_detail'] = $userDetail;
        $response['user_status'] = $userStatus;
        $response['success'] = true;
        
        return response()->json($response);
    }

    public function signup(UserSignupRequest $request)
    {
        $response = array();

        $user = new User();
        $user->id = $request->id;
        $user->username = $request->username;
        if ($request->has('email')) {
            if (!is_null($request->email)) {
                $user->email = $request->email;
            }
        }

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                $response['error'] = 'Pseudoname is already in use. Please choose a different pseudoname.';
                return response()->json($response);
            }
        }

        $userDetail = new UserDetail();
        $userDetail->user_id = $request->id;
        $userDetail->school_id = $request->school_id;
        $userDetail->firstname = $request->firstname;
        $userDetail->lastname = $request->lastname;

        if ($request->has('middlename')) {
            if (!is_null($request->middlename)) {
                $userDetail->middlename = 'middlename';
            }
        }

        if ($request->has('gender')) {
            if (!is_null($request->gender)) {
                $user->gender = $request->gender;
            }
        }

        if ($request->has('birthdate')) {
            if (!is_null($request->birthdate)) {
                $user->birthdate = $request->birthdate;
            }
        }

        $userDetail->save();

        $userStatus = UserStatus::create([
            'user_id' => $request->id
        ]);

        $response['success'] = true;

        return response()->json($response);
    }

}
