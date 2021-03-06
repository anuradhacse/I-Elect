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

                    <h1>Voter Manager</h1>
                    <hr>
                    <h4>Ongoing Elections</h4>
                    @foreach($ongoing_elections as $election)

                        <a href="{{action('ElectionController@vote',$election->id)}}">{{$election->name}}</a>
                        <br>
                        @endforeach
                    <hr>
                <h4>Future Elections</h4>
                @foreach($future_elections as $election)

                    <a href="{{action('ElectionController@vote',$election->id)}}">{{$election->name}}</a>
                    <br>
                @endforeach
                <hr>
                <h4>Finished Elections</h4>
                @foreach($finished_elections as $election)

                    <a href="{{action('ElectionController@vote',$election->id)}}">{{$election->name}}</a>
                    <br>
                @endforeach


    </div>
        </div>
    </div>
@endsection