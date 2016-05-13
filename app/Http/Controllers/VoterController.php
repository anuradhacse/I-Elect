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
        $election=Election::findOrFail($id);
        return view('voter.create',compact('id','voters','election'));
    }

    /**
     * creating voter first makes an user an then create voter with that user id.
     * @return string|static
     */
    public function store(Requests\createVoterRequest $request){

        $input=$request->all();

//if a voter (by email) already exists then we dont have to create him again.can use same account and with same password then he
        //can use it and vote all elections he has eligible for
        //user should be a voter check role=2
        $requirement=['email'=>$input['email'],'role'=>'2'];
        $ex_user=User::where($requirement)->first();
        if($ex_user['exists']){

            //existing user cannot be assign to same election twice
            $ex_voter=Voter::where('user_id',$ex_user['id'])->first();
            $ex_election= Voter::find($ex_voter['id'])->elections()->having('election_id','=',$input['election_id'])->first();
     
            if($ex_election['exists']){
                dd('ele exists');
            }

            Election::find($input['election_id'])->voters()->attach($ex_user['id']);
            dd('ok exists');
        }

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
