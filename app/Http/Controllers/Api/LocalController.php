<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Local_Delivery;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    //
    public function index(){
        return response([
            'locals' => Local_Delivery::orderBy('local','asc')->get()
        ],200);
    }
}
