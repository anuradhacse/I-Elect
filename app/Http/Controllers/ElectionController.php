<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Election;
use Illuminate\Http\Request;

use App\Http\Requests;

class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $user_id=\Auth::user()->id;

        $admin=Admin::where('user_id',$user_id)->get();


        foreach($admin as $item){
            $admin_id=$item->id;
        }



        $elections=Election::where('admin_id',$admin_id)->get();

        return view('elections.show',compact('elections'));
    }
}
