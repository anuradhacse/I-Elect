<?php

namespace App\Http\Controllers;

use Request;
use App\User;


use App\Http\Requests;

class VoterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }
    public function create(){
        return view('voter.create');
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

            return $user;




    }

}
