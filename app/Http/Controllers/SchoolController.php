<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getAllSchools(){
        $response = array();

        $schools = School::all();

        $response['schools'] = $schools;
        $response['success'] = true;
        return response()->json($response);
    }
}
