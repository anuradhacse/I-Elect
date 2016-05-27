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
                            <td>{{$election->name}}
                            </td>

                        </tr>
                        <tr>
                            <td>Start date</td>
                            <td>{{$election->start_date->toDateString()}}


                        </tr>
                        <tr>
                            <td>Start time</td>
                            <td>{{$election->start_time}}
                            </td>

                        </tr>
                        <tr>
                            <td>End date</td>
                            <td>{{$election->end_date->toDateString()}}
                          </td>

                        </tr>
                        <tr>
                            <td>End time</td>
                            <td>{{$election->end_time}}
                            </td>

                        </tr>
                        <tr>
                            <td>No.of Voters</td>
                            <td>{{$election->voters->count()}}
                            </td>


                        </tr>

                        <tr>
                            <td>No.of Candidates</td>
                            <td>{{$election->candidates->count()}}</td>


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