@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')
@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            <div class="panel-heading">

                <ul class="nav nav-tabs ">
                    <li><a href="#">Settings</a></li>
                    <li><a href="#" >Activity Log</a></li>
                </ul>
            </div>

            <div class="panel-body">
                <div class="">
                    <h1>Candidates For this Election</h1>
                    <hr>
                    {!! Form::open(['action'=>'VoterController@vote']) !!}
                    {!! Form::hidden('election_id',$id) !!}
                    @foreach($candidates as $candidate)
                        {!! Form::radio('candidate_id', $candidate->id) !!}
                        <a href="{{action('CandidateController@show',$candidate->id)}}">{{$candidate->name}}</a> <br>
                    @endforeach
                    <br>
                    {!! Form::submit('cast vote',['class' => 'btn btn-primary form-control']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection