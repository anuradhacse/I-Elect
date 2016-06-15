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
                    Name of Candidate:<b style="color:#31b0d5; font-size: 18px"><i>{{$candidate->name}}</i></b><hr>
                    Details Of Candidate:<b style="color:#31b0d5; font-size: 18px"><i>{{$candidate->description}}</i></b><hr>
                    Profile Picture:

                    @if( $candidate['image_path'] != "")
                        <img src='{{asset("uploads/".$candidate['image_path'])}}' width="400px" height="400px">
                        @else
                        No image
                        @endif

                </div>
            </div>
        </div>
    </div>
@endsection