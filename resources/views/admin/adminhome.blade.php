@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-heading">

                      <ul> Create Election</ul>



                    </div>

                    <div class="panel-body">
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Election name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>No.of Candidates</th>
                                <th>No.of voters</th>
                                <th>votes</th>
                                <th>Status</th>
                                <th>Action</th>



                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Election name</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>No.of Candidates</th>
                                <th>No.of voters</th>
                                <th>votes</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($elections as $election)
                                <tr>
                                    <td>{{$election->name}}</td>
                                    <td>{{$election->details}}</td>
                                    <td>{{$election->start_date}}</td>
                                    <td>{{$election->end_date}}</td>
                                    <td>{{$election->name}}</td>
                                    <td>{{$election->name}}</td>
                                    <td>finished</td>
                                    <td>delete</td>
                                </tr>

                                @endforeach




                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
