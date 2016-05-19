<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Election;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**candidate creating form
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        //current election where candidates are beign added
        $election = Election::findOrFail($id);
        //already eligible candidates for the current editing election
        $candidates = Election::find($id)->candidates()->get();
        return view('candidates.create', compact('id', 'election', 'candidates'));
    }


    /**
     * store candidates for a perticular election
     * @param Requests\createCandidateRequest $requests
     * @return mixed
     */
    public function store(Requests\createCandidateRequest $requests)
    {

        $input = $requests->all();
        $requirement = ['email' => $input['email']];
        $ex_can = Candidate::where($requirement)->first();
        if ($ex_can['exists']) {
            $ex_election = Candidate::find($ex_can['id'])->elections()->having('election_id', '=', $input['election_id'])->first();

            if ($ex_election['exists']) {
                flash()->overlay('This Candidate has already been selected for this election');
                return Redirect::back()->with('message', 'Voter Added !');
            }
            //this is the way to insert values to many to many relation in(table candidate_election)
            Election::find($input['election_id'])->candidates()->attach($ex_can['id']);
            flash()->info('This Candidate has successfully added to election');
            return Redirect::back();
        }


        if (Input::hasFile('image_path')) {
            $file = Input::file('image_path');
            $file->move('uploads', $file->getClientOriginalName());


        }


        //ading the newly created candidate to candidate table as wel as to candidate_election table
        $candidate = Candidate::create($input);
        $candidate['image_path'] = $file->getClientOriginalName();
        $candidate->save();

        Election::find($input['election_id'])->candidates()->attach($candidate['id']);
        flash()->info('This New Candidate has successfully added to election');
        return Redirect::back();


    }

    /**
     *show canidate details to voters
     */
    public function show($id)
    {

        $candidate = Candidate::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }

}
