@extends('layouts.app')


@section('head')
    @include('partials.navcsspartial')

@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.adminnav')
            <div class="panel-body">
                {!! Form::open(['action'=>'ElectionController@store']) !!}
                @include('partials.electionform',['submitBtnName'=>'Create Election'])
                {!! Form::close() !!}
                @include('errors.errorlist')
            </div>
        </div>
    </div>
    </div>

    </div>




@endsection

