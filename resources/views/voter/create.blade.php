@extends('layouts.app')

@section('head')
    <style>
        .form-group{


            padding-left: 10%;
            padding-right: 5%;

        }

    </style>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">Add voter to Election: </div>

                    <div class="panel-body">
                        {!! Form::open(['action'=>'VoterController@store']) !!}
                        <!-- this is the election id of current election where this voter is going to vote -->
                        {!! Form::hidden('election_id',$id) !!}
                        <div class="form-group">

                            {!! Form::label('name','Name Of the Voter:') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Email','Email:') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Password','Password:') !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">


                            {!! Form::submit('Add voter',['class' => 'btn btn-primary form-control']) !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('errors.errorlist')
    </div>


    {!! Form::close() !!}


@stop