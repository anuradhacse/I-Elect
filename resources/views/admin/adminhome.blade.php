@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            @include('partials.adminnav')

            <div class="panel-body">
                <div class="">
                    <h1>your current elections</h1>
                    <hr>
                </div>

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
                            <td><a href="{{action('ElectionController@show',$election->id)}}">{{$election->name}}</a>
                            </td>
                            <td>{{$election->details}}</td>
                            <td>{{$election->start_date}}</td>
                            <td>{{$election->end_date}}</td>
                            <td>{{$election->name}}</td>
                            <td>{{$election->name}}</td>
                            <td>finished</td>
                            <td>{!! Form::open(['method'=>'DELETE','action' => ['ElectionController@delete', $election->id]])  !!}
                                <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                {!! Form::close() !!}</td>


                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endsection
