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
        $this->middleware('finalize',['only'=>['create']]);
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

        if (Input::hasFile('image_path')) {
            $file = Input::file('image_path');
            $file->move('uploads', $file->getClientOriginalName());


        }

        if ($ex_can['exists']) {
            $ex_election = Candidate::find($ex_can['id'])->elections()->having('election_id', '=', $input['election_id'])->first();

            if ($ex_election['exists']) {
                flash()->overlay('This Candidate has already been selected for this election');
                return Redirect::back()->with('message', 'Voter Added !');
            }
            //this is the way to insert values to many to many relation in(table candidate_election)
            $ex_can->name=$input['name'];
            $ex_can->description=$input['description'];
            $ex_can->image_path=$file->getClientOriginalName();
            $ex_can->save();
            Election::find($input['election_id'])->candidates()->attach($ex_can['id']);
            flash()->info('This Candidate has successfully added to election');
            return Redirect::back();
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
/**
 * @param $id
 * @return Redirect
 * cannot delete a candidate if he has assigned for more than one election
 * if candidate is in only one election then delete from candidate table
 * */
    public function delete(Requests\createCandidateDeleteRequest $request,$id){
        $candidate = Candidate::findOrFail($id);

        $no_of_elections=$candidate->elections()->count();
        if($no_of_elections==1){
            $candidate->destroy($candidate->id);
        }
        else{

            $candidate->elections()->detach($request->election_id);
        }

        flash()->success('successfully deleted the candidate');
        return Redirect::back();
    }

    public function showAll(){

    }
}
