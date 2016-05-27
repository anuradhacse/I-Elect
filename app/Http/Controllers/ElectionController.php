<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Election;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Request;
use Carbon\Carbon;

use App\Http\Requests;


class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = \Auth::user()->id;
//return a collection
        $admin = Admin::where('user_id', $user_id)->get();

//can get null pointer exception if $admin is null

        $elections1 = $admin[0]->elections;
        $elections=$elections1->sortBy('created_at');

        return view('admin.adminhome', compact('elections'));
    }

    public function create()
    {
        return view('elections.create');
    }

    public function store(Requests\createElectionRequest $request)
    {
        $input = $request->all();
        if($input['end_date']<$input['start_date']){
            flash()->error('Election end date should be a date after start date');
            return Redirect::back();
        }
        else if($input['end_date']==$input['start_date']){
            if($input['end_time']<=$input['start_time']){
                flash()->error('Election end time should be a time after start time');
                return Redirect::back();
            }
        }


        $user_id = Auth::user()->id;
        $admin = Admin::where('user_id', $user_id)->first();
        //getting the admin object and creating an object.here it will automatically update admin_id (foriegn key)
        $admin->elections()->create($input);
        return redirect('elections');
    }

    public function show($id)
    {

        $election = Election::findOrFail($id);
        return view('elections.show', compact('election'));
    }

    public function vote($id)
    {
        $election=Election::find($id);
        $candidates = Election::find($id)->candidates()->get();

        if($election->end_date<\Carbon\Carbon::today('Asia/Colombo')){
            flash()->error('this election is over');
            return Redirect::back();
        }

         elseif($election->end_date===\Carbon\Carbon::today('Asia/Colombo')){

             if($election->end_time<=\Carbon\Carbon::now('Asia/Colombo')){
                 flash()->error('this election is over');
                 return Redirect::back();
             }
         }

        else{
            return view('voter.vote', compact('candidates', 'id'));
        }




    }

    public function edit($id)
    {
        $election = Election::findOrFail($id);
        return view('elections.edit', compact('election'));
    }

    public function update($id, Requests\createElectionRequest $request)
    {
        $input=$request->all();
        if($input['end_date']<$input['start_date']){
            flash()->error('Election end date should be a date after start date');
            return Redirect::back();
        }
        else if($input['end_date']==$input['start_date']){
            if($input['end_time']<=$input['start_time']){
                flash()->error('Election end time should be a time after start time');
                return Redirect::back();
            }
        }

        $election = Election::findOrFail($id);
        $election->update($request->all());
        flash()->success('successfully updated the information');
        return redirect('elections');
    }

    /**
     * You may notice that the delete button is inside a form. The reason for
     * this is that the destroy() method from our controller needs a DELETE request, and this can be done in this way.
     * If the button was a simple link, the request would be sent
     * via the GET method, and we wouldn’t call the destroy() method.
     */
    public function delete($id)
    {

        $election = Election::findOrFail($id);
        $election->destroy($id);
        flash()->success('successfully deleted the election');
        return redirect('elections');
    }

    /**
     * finalize an election
     * check for at least one candidate
     * check for at least one voter
     * checking start date in future
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finalize($id){
        $election = Election::findOrFail($id);
        $voter_count=$election->voters()->count();
        $candidate_count=$election->candidates()->count();
        if($voter_count==0){
           Session::flash('voter_error','Please Add Voters');

        }
        if($candidate_count==0){
            Session::flash('candidate_error','Please Add Candidates');
        }

        if($election->start_date<=Carbon::today('Asia/Colombo')){
            Session::flash('start_date_error','Please Select a Future Date as start date');

        }
        if($election->end_date<Carbon::today('Asia/Colombo')){
            Session::flash('end_date_error','Please Select a Future Date as End date');

        }
        return view('elections.finalize', compact('election'));
    }
}
