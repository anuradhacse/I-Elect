@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')

@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.navpartial')

            <div class="panel-body">
                <div class="">
                    <h1>Election Manager</h1>
                    <hr>
                </div>
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Attributes of Election</th>
                        <th>Values</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>

                        <th>Attributes of Election</th>
                        <th>Values</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    <tr>
                        <td>Election name</td>
                        <td>{{$election->name}}
                        </td>
                        <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Valid</td>
                    </tr>
                    <tr>
                        <td>Start date</td>
                        <td>{{$election->start_date->toDateString()}}
                        </td>
                        @if (Session::has('start_date_error'))
                            <td class="alert-danger">{{ Session::get('start_date_error') }}&nbsp;&nbsp;  <a href="{{action('ElectionController@edit',$election->id)}}"><button class="btn btn-danger btn-mini">FIX ERROR</button></a></td>

                        @else
                            <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Valid</td>
                        @endif

                    </tr>
                    <tr>
                        <td>Start time</td>
                        <td>{{$election->start_time}}
                        </td>
                        <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Valid</td>
                    </tr>
                    <tr>
                        <td>End date</td>
                        <td>{{$election->end_date->toDateString()}}
                        </td>
                        @if (Session::has('end_date_error'))

                            <td class="alert-danger">  {{ Session::get('end_date_error') }}&nbsp;&nbsp;  <a href="{{action('ElectionController@edit',$election->id)}}"><button class="btn btn-danger btn-mini">FIX ERROR</button></a></td>


                        @else
                            <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Valid</td>
                        @endif

                    </tr>
                    <tr>
                        <td>End time</td>
                        <td>{{$election->end_time}}
                        </td>
                        <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                            <span class="sr-only">Error:</span>
                            Valid</td>
                    </tr>
                    <tr>
                        <td>No.of Voters</td>
                        <td>{{$election->voters->count()}}
                        </td>
                        @if (Session::has('voter_error'))

                            <td class="alert-danger">{{ Session::get('voter_error') }}&nbsp;&nbsp; <a href="{{action('VoterController@create',$election->id)}}"><button class="btn btn-danger btn-mini">FIX ERROR</button></a></td>



                        @else
                            <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Valid</td>
                        @endif

                    </tr>

                    <tr>
                        <td>No.of Candidates</td>
                        <td>{{$election->candidates->count()}}</td>
                        @if (Session::has('candidate_error'))

                            <td class="alert-danger">{{ Session::get('candidate_error') }}&nbsp;&nbsp; <a href="{{action('CandidateController@create',$election->id)}}"><button class="btn btn-danger btn-mini">FIX ERROR</button></a></td>



                        @else
                            <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                Valid</td>
                        @endif

                    </tr>


                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#example').DataTable(
                    {
                        "aaSorting": []
                    }
            );

        });
    </script>
@endsection