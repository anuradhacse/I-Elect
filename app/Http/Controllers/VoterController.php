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
    public function store(){

        $input=Request::all();
        $validator=validator($input);

        if($validator){
        dd('validation passed');
            $user= User::create([
                'role'=> "2",
                'name'=>$input['name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
            ]);

            return $user;
        }

        return 'error';

    }
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
    }
}
