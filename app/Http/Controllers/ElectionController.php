<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ElectionController extends Controller
{
    public function index(){
        return "all elections";
    }
}
