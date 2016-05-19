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
                    <h1>Voter Manager</h1>
                    <hr>
                    @foreach($elections as $election)

                        <a href="{{action('ElectionController@vote',$election->id)}}">{{$election->name}}</a>
                        <br>
                        @endforeach

        </div>
    </div>
        </div>
    </div>
@endsection