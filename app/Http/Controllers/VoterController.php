<?php

namespace App\Http\Controllers;

use App\Election;
use App\Voter;
use Request;
use App\User;


use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }
    public function create($id){

        $voters=\App\Election::find($id)->voters()->get();
        return view('voter.create',compact('id','voters'));
    }

    /**
     * creating voter first makes an user an then create voter with that user id.
     * @return string|static
     */
    public function store(Requests\createVoterRequest $request){

        $input=$request->all();


            $user= User::create([
                'role'=> "2",
                'name'=>$input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
            ]);

        $voter= Voter::create([
            'candidate_id'=> "1",
            'user_id' => $user['id'],
            'name'=>$user['name'],


        ]);
//this is the way to insert values to many to many relation in(table election_voter)
        Election::find($input['election_id'])->voters()->attach($voter['id']);

        return Redirect::back()->with('message','Voter Added !');




    }

}
