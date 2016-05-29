@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')
    <script type="text/javascript">

        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "theme2",//theme1
                title:{
                    text: "Votes for each candidate of Election- {{$election->name}}"
                },
                animationEnabled: false,   // change to true
                data: [
                    {
                        // Change type to "bar", "area", "spline", "pie",etc.
                        type: "column",
                        dataPoints: [
                            { label: "apple",  y: 10  },
                            { label: "orange", y: 15  },
                            { label: "banana", y: 25  },
                            { label: "mango",  y: 30  },
                            { label: "grape",  y: 28  }
                        ]
                    }
                ]
            });
            chart.render();
        }
    </script>

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.navpartial')

            <div class="panel-body">
                <h1>Final Results of Election</h1>
                <hr>
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>



        </div>
    </div>
    </div>

@endsection