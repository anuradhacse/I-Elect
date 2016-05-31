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
                    <h1>Candidate Details</h1>
                    <hr>
                    Name of Candidate:{{$candidate->name}}<hr>
                    Details Of Candidate{{$candidate->description}}<hr>
                    Profile Picture:

                    @if( $candidate['image_path'] != "")
                        <img src='{{asset("uploads/".$candidate['image_path'])}}' width="100px" height="100px">
                        @else
                        No image
                        @endif

                </div>
            </div>
        </div>
    </div>
@endsection