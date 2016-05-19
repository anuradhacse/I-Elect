@extends('layouts.app')

@section('head')
@include('partials.navcsspartial')
@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

       @include('partials.navpartial')

            <div class="panel-body">
                <div class="">
                    <h1>Election Manager</h1>
                    <hr>
                </div>
                Election name:{{$election->name}}<br>
                Election details:{{$election->details}}<br>
                Starting date:{{$election->start_date}}<br>
                Starting time:{{$election->start_time}}<br>
                Ending Date:{{$election->end_date}}<br>
                Ending time:{{$election->end_time}}<br>

            </div>
        </div>
    </div>
    @endsection