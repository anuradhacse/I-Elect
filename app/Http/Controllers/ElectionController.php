<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Election;
use Illuminate\Support\Facades\Auth;
use Request;

use App\Http\Requests;


class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $user_id=\Auth::user()->id;
//return a collection
        $admin=Admin::where('user_id',$user_id)->get();



//can get null pointer exception if $admin is null

        $elections=$admin[0]->elections;

        return view('elections.show',compact('elections'));
    }

    public function create(){
        return view('elections.create');
    }

    public function store(){
        $input=Request::all();

        $user_id=Auth::user()->id;
        //this will return a collection(array).so need to take 1st element
        $admin=Admin::where('user_id',$user_id)->get();
        $id=$admin[0]->id;


        $election= Election::create();
        $election['admin_id']=$id;




        return redirect('elections');
    }
}
