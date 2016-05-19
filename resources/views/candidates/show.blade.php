@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')
@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">



            <div class="panel-body">
                <div class="">
                    <h1>Candidate Details</h1>
                    <hr>
                    {{$candidate->name}}<br>
                    {{$candidate->description}}<br>
                    {{$candidate->image_path}}<br>
                    <img src='{{asset("uploads/".$candidate['image_path'])}}' width="100px" height="100px">
                </div>
            </div>
        </div>
    </div>
@endsection