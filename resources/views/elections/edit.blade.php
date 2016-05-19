@extends('layouts.app')

@section('head')
   @include('partials.navcsspartial')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel with-nav-tabs panel-info ">
            @include('partials.navpartial')

                    <div class="panel-body">
                        {!! Form::model($election,['method'=>'PATCH','action'=>['ElectionController@update',$election->id]]) !!}
                        @include('partials.electionform',['submitBtnName'=>'update Election details'])
                        {!! Form::close() !!}
                        @include('errors.errorlist')
                    </div>
                </div>
            </div>





@endsection