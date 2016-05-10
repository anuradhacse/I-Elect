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
                <div class="panel panel-default">
                    <div class="panel-heading">Voters Dashboard | Eligible Elections | View Candidate </div>

                    <div class="panel-body">
                        {!! Form::open(['action'=>'CandidateController@store','files'=>true]) !!}
                        <div class="form-group">

                            {!! Form::label('name','Name Of the Candidate:') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Email','Email:') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('des','Description:') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('des','Image:') !!}
                            {!! Form::file('image_path') !!}

                        </div>


                        <div class="form-group">


                            {!! Form::submit('Add Candidate',['class' => 'btn btn-primary form-control']) !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('errors.errorlist')
    </div>


    {!! Form::close() !!}


@stop