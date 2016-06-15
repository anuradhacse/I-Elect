<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Election;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Khill\Lavacharts\Lavacharts;
use Request;
use Carbon\Carbon;
use Mail;

use Helfull\CanvasJS\Chart;
use Helfull\CanvasJS\Chart\ChartData;
use Helfull\CanvasJS\Chart\DataPoint;

use App\Http\Requests;


class ElectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('finalize',['only'=>['edit','finalize','results']]);
        $this->middleware('admin_privilage',['except'=>'vote']);
    }

    public function index()
    {

        $user_id = \Auth::user()->id;
//return a collection
        $admin = Admin::where('user_id', $user_id)->get();

//can get null pointer exception if $admin is null

        $elections1 = $admin[0]->elections;
        $elections = $elections1->sortBy('created_at');

        return view('admin.adminhome', compact('elections'));
    }

    public function create()
    {
        return view('elections.create');
    }

    public function store(Requests\createElectionRequest $request)
    {
        $input = $request->all();
        if ($input['end_date'] < $input['start_date']) {
            flash()->error('Election end date should be a date after start date');
            return Redirect::back();
        } else if ($input['end_date'] == $input['start_date']) {
            if ($input['end_time'] <= $input['start_time']) {
                flash()->error('Election end time should be a time after start time');
                return Redirect::back();
            }
        }


        $user_id = Auth::user()->id;
        $admin = Admin::where('user_id', $user_id)->first();
        //getting the admin object and creating an object.here it will automatically update admin_id (foriegn key)
        $election=$admin->elections()->create($input);
        return redirect('elections');
    }

    public function show($id)
    {

        $election = Election::findOrFail($id);
        return view('elections.show', compact('election'));
    }

    public function vote($id)
    {
        $election = Election::find($id);
        $candidates = Election::find($id)->candidates()->get();

        if($election->end_date<Carbon::today('Asia/Colombo')){
            flash()->error('This Election is Finished.You cannot vote now');
            return Redirect::back();
        }
        else if($election->end_date->toDateString()==Carbon::today('Asia/Colombo')->toDateString()){

            if($election->end_time<=Carbon::now('Asia/Colombo')->toTimeString()){
                flash()->error('This Election is Finished.You cannot vote now');
                return Redirect::back();
            }
            elseif($election->start_time<=Carbon::now('Asia/Colombo')->toTimeString()){
                if(!$election->finalize){
                    flash()->error('This election is not finalized.sorry you cant vote until itz finalized');
                    return Redirect::back();
                }
                return view('voter.vote', compact('candidates', 'id'));
            }
            else{
                flash()->error('This Election is not started yet');
                return Redirect::back();

            }

        }
        //ongoing elections
        elseif($election->start_date<Carbon::today('Asia/Colombo') && $election->end_date>=Carbon::today('Asia/Colombo')){
            if(!$election->finalize){
                flash()->error('This election is not finalized.sorry you cant vote until it is finalized');
                return Redirect::back();
            }
            return view('voter.vote', compact('candidates', 'id'));
        }
        elseif($election->start_date->toDateString()==Carbon::today('Asia/Colombo')->toDateString()){
            if($election->start_time<=Carbon::now('Asia/Colombo')->toTimeString()){
                if(!$election->finalize){
                    flash()->error('This election is not finalized.sorry you cant vote until itz finalized');
                    return Redirect::back();
                }
                return view('voter.vote', compact('candidates', 'id'));
            }
            else{
                flash()->error('This Election is not started yet');
                return Redirect::back();
            }


        }
        else{
            flash()->warning('This Election is not started yet');
            return Redirect::back();

        }



    }

    public function edit($id)
    {
        $election = Election::findOrFail($id);
        return view('elections.edit', compact('election'));
    }

    public function update($id, Requests\createElectionRequest $request)
    {
        $input = $request->all();
        if ($input['end_date'] < $input['start_date']) {
            flash()->error('Election end date should be a date after start date');
            return Redirect::back();
        } else if ($input['end_date'] == $input['start_date']) {
            if ($input['end_time'] <= $input['start_time']) {
                flash()->error('Election end time should be a time after start time');
                return Redirect::back();
            }
        }

        $election = Election::findOrFail($id);
        $election->update($request->all());
        flash()->success('successfully updated the information');
        return redirect('elections/'.$election->id.'/show');
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
    public function finalize($id)
    {
        $errors = false;
        $election = Election::findOrFail($id);
        //dont put $election->voters() it wont work
        $voters=$election->voters;
        $voter_count = $election->voters()->count();
        $candidate_count = $election->candidates()->count();
        if ($voter_count == 0) {
            Session::flash('voter_error', 'Please Add Voters');
            $errors = true;

        }
        if ($candidate_count == 0) {
            Session::flash('candidate_error', 'Please Add Candidates');
            $errors = true;
        }

        if ($election->start_date < Carbon::today('Asia/Colombo')) {
            Session::flash('start_date_error', 'Please Select a Future Date as start date');
            $errors = true;

        }
        if ($election->start_date->toDateString() == Carbon::today('Asia/Colombo')->toDateString()) {

            if ($election->start_time <= Carbon::now('Asia/Colombo')->toTimeString()) {
                Session::flash('start_time_error', 'Please Select a Future time as start time');
                $errors = true;
            }


        }
        if ($election->end_date < Carbon::today('Asia/Colombo')) {
            Session::flash('end_date_error', 'Please Select a Future Date as End date');
            $errors = true;

        }
        if ($election->end_date->toDateString() == Carbon::today('Asia/Colombo')->toDateString()) {

            if ($election->end_time <= Carbon::now('Asia/Colombo')->toTimeString()) {
                Session::flash('end_time_error', 'Please Select a Future time as end time');
                $errors = true;
            }


        }

        if (!$errors) {

            foreach($voters as $voter){
                $user=User::find($voter->user_id);
                $data = array( 'email' => $user->email,'name'=>$voter->name);


                Mail::send('auth.emails.test', $data, function ($m) use($data) {
                    $m->from('anuradha@ielect.com', 'iElect-online elections');
                    $m->to($data['email'], $data['name'])->subject('Welcome to iElect online voting system');
                });
            }
            flash()->info('Your Election is Successfully Finalized.Sent Emails to Voters using email Blast');
            $election['finalize']=true;
            $election->save();
        }
        return view('elections.finalize', compact('election'));
    }

    /**
     * showing results to users complete statistics with graphical charts
     * @param $id
     */
    public function results($id)
    {
        $election = Election::findOrFail($id);
        $candidates = $election->candidates;


        $voters = $election->voters();
        $lava = new Lavacharts();
        //column chart
        $reasons = $lava->DataTable();
        $reasons->addStringColumn('Name')
                    ->addNumberColumn('votes');

        foreach ($candidates as $candidate) {
                    $reasons->addRow(array($candidate->name,$election->voters()->wherePivot('candidate_id','=',$candidate->id)->count()));

        }

        //donought chart
        $reasons1= $lava->DataTable();
        $reasons1->addStringColumn('name')
            ->addNumberColumn('votes');


        foreach($candidates as  $candidate){
            $reasons1->addRow(array($candidate->name,$election->voters()->wherePivot('candidate_id','=',$candidate->id)->count()));
        }
        $donutchart = $lava->DonutChart('IMDB', $reasons1, [
            'title' => 'Votes Taken by each candidate as a percentage(%) ',
            'Animation'=>'true',
            'titlePosition'     => 'centre',
            'titleTextStyle' => [
                'color'    => '#81B0D1',
                'fontSize' => 18,
                'font'=>'"Palatino Linotype", "Book Antiqua", Palatino, serif',

            ],
            'width'=>"100%",
            'height'=>"100%",
            'pieHole' => 0.4,



        ]);
//

        $lava->ColumnChart('vote', $reasons, [
            'title' => 'Number of Votes of Each candidate in Election - '.$election->name,
            'titleTextStyle' => [
                'color'    => '#81B0D1',
                'fontSize' =>18,
                'font'=>'"Palatino Linotype", "Book Antiqua", Palatino, serif',
            ],
            'role'=>'style',
            'colors'=>['#CF81D1'],


        ]);



        return view('elections.result', compact('election', 'candidates', 'voters', 'lava'));


    }



}
