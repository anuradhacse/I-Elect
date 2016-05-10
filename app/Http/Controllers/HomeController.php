<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Admin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminHome()
    {
        $user_id=\Auth::user()->id;
//return a collection
        $admin= Admin::where('user_id',$user_id)->get();



//can get null pointer exception if $admin is null

        $elections=$admin[0]->elections;

        return view('admin.adminhome',compact('elections'));

    }
    public function voterHome()
    {
        return view('voter.voterhome');
    }
}
