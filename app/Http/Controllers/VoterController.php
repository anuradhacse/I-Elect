<?php

namespace App\Http\Controllers;

use App\Election;
use App\Voter;
use Laracasts\Flash\Flash;
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

    public function index()
    {

    }

    public function create($id)
    {

        $voters = \App\Election::find($id)->voters()->get();
        $election = Election::findOrFail($id);
        return view('voter.create', compact('id', 'voters', 'election'));
    }

    /**
     * creating voter first makes an user an then create voter with that user id.
     * @return string|static
     */
    public function store(Requests\createVoterRequest $request)
    {

        $input = $request->all();

//if a voter (by email) already exists then we dont have to create him again.can use same account and with same password then he
        //can use it and vote all elections he has eligible for
        //user should be a voter check role=2

        $requirement_voter = ['email' => $input['email'], 'role' => '2'];
        $requirement_admin = ['email' => $input['email'], 'role' => '1'];
        $ex_admin = User::where($requirement_admin)->first();
        if ($ex_admin['exists']) {
            flash()->overlay('This user already exists as an admin..please use another email to create an account as a voter');
            return Redirect::back();
        }
        $ex_user = User::where($requirement_voter)->first();

        if ($ex_user['exists']) {

            //existing user cannot be assign to same election twice
            $ex_voter = Voter::where('user_id', $ex_user['id'])->first();
            $ex_election = Voter::find($ex_voter['id'])->elections()->having('election_id', '=', $input['election_id'])->first();

            if ($ex_election['exists']) {
                flash()->overlay('This voter has already been selected for this election', 'Error detected');
                return Redirect::back()->with('message', 'Voter Added !');
            }
        }

        $user = User::create([
            'role' => "2",
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

        $voter = Voter::create([
            'candidate_id' => "1",
            'user_id' => $user['id'],
            'name' => $user['name'],


        ]);
//this is the way to insert values to many to many relation in(table election_voter)
        Election::find($input['election_id'])->voters()->attach($voter['id']);

        flash()->info('Voter Added Successfully');

        return Redirect::back()->with('message', 'Voter Added !');

    }

    public function voterHome()
    {

        $auth_user = \Auth::user()->id;
        $voter = Voter::where('user_id', $auth_user)->first();
        $elections = Voter::find($voter['id'])->elections()->get();
        return view('voter.voterhome', compact('elections'));


    }

    public function vote(Requests\createCastVoteRequest $request)
    {

        $election_id = $request['election_id'];
        $candidate_id = $request['candidate_id'];
        $auth_user = \Auth::user()->id;
        $voter = Voter::where('user_id', $auth_user)->first();

        $c = Election::find($election_id)->voters()->findOrFail($voter['id'])->pivot->candidate_id;

        //filing candidate_id co;umn in the pivot table election_voter
        if ($c == null) {
            Election::find($election_id)->voters()->sync([$voter['id'] => ['candidate_id' => $candidate_id]], false);
            flash()->info('successfully added your vote');

        } else {
            flash()->overlay('you have already voted for this election');
        }
        return Redirect('/voterhome');

    }
}
