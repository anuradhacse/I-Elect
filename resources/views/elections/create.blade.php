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
                 <div class="panel-heading">Voters Dashboard | Eligible Elections | View Candidate </div>

                 <div class="panel-body">
                     {!! Form::open(['action'=>'ElectionController@store']) !!}
                     <div class="form-group">

                         {!! Form::label('name','Name Of the Election:') !!}
                         {!! Form::text('name',null,['class'=>'form-control']) !!}

                     </div>
                     <div class="form-group">

                         {!! Form::label('details','Details:') !!}
                         {!! Form::textarea('details',null,['class'=>'form-control']) !!}

                     </div>
                     <div class="form-group">

                         {!! Form::label('date','Starting date:') !!}
                         {!! Form::input('date','start_date',date('Y-m-d'),['class'=>'form-control']) !!}

                     </div>
                     <div class="form-group">

                         {!! Form::label('time','Starting time:') !!}
                         {!! Form::input('time','start_time',time('H-m-s'),['class'=>'form-control']) !!}

                     </div>

                     <div class="form-group">

                         {!! Form::label('date','Ending date:') !!}
                         {!! Form::input('date','end_date',date('Y-m-d'),['class'=>'form-control']) !!}

                     </div>
                     <div class="form-group">

                         {!! Form::label('time','Ending time:') !!}
                         {!! Form::input('time','end_time',time('H-m-s'),['class'=>'form-control']) !!}

                     </div>
                     <div class="form-group">


                         {!! Form::submit('Save Election',['class' => 'btn btn-primary form-control']) !!}

                     </div>
                 </div>
             </div>
         </div>
     </div>
     @include('errors.errorlist')
 </div>


{!! Form::close() !!}

   @stop