@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')


@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.navpartial')

            <div class="panel-body">
                <h1>Final Results of Election</h1>
                <hr>
        {!! $chart->render() !!}

            </div>



        </div>
    </div>
    </div>

@endsection