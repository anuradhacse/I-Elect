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

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>

                        <th>Attributes of Election</th>
                        <th>Values</th>

                    </tr>
                    </tfoot>
                    <tbody>

                        <tr>
                            <td>Election name</td>
                            <td><a href="{{action('ElectionController@edit',$election->id)}}">{{$election->name}}</a>
                            </td>

                        </tr>
                        <tr>
                            <td>Start date</td>
                            <td><a href="{{action('ElectionController@edit',$election->id)}}">{{$election->start_date->toDateString()}}</a></td>

                        </tr>
                        <tr>
                            <td>Start time</td>
                            <td><a href="{{action('ElectionController@edit',$election->id)}}">{{$election->start_time}}</a>
                            </td>

                        </tr>
                        <tr>
                            <td>End date</td>
                            <td><a href="{{action('ElectionController@edit',$election->id)}}">{{$election->end_date->toDateString()}}</a>
                          </td>

                        </tr>
                        <tr>
                            <td>End time</td>
                            <td><a href="{{action('ElectionController@edit',$election->id)}}">{{$election->end_time}}</a>
                            </td>

                        </tr>
                        <tr>
                            <td>No.of Voters</td>
                            <td><a href="{{action('VoterController@create',$election->id)}}">{{$election->voters->count()}}</a>
                            </td>


                        </tr>

                        <tr>
                            <td>No.of Candidates</td>
                            <td><a href="{{action('CandidateController@create',$election->id)}}">{{$election->candidates->count()}}</a></td>


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