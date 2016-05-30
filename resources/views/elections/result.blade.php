@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')


@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.navpartial')

            <div class="panel-body" >
                <h1>Final Results of Election</h1>
                <hr>
                <div id="chart-div" style="width: 100%; height: 600px; padding: 5px"></div>
                <div id="chart-div2" style="width: 100%; height: 600px; padding: 5px"></div>

                {!! $lava->render('ColumnChart', 'vote', 'chart-div') !!}
                {!! $lava->render('DonutChart', 'IMDB', 'chart-div2') !!}

               
            </div>



        </div>
    </div>
    </div>

@endsection