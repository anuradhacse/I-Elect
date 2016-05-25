<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Election;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

        $elections = $admin[0]->elections;

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
        $candidates = Election::find($id)->candidates()->get();
        return view('voter.vote', compact('candidates', 'id'));
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
}
