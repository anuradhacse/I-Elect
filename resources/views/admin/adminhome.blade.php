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
                            <td>{{$election->start_date->toDateString()}} &nbsp;{{$election->start_time}}</td>
                            <td>{{$election->end_date->toDateString()}} &nbsp;{{$election->end_time}}</td>
                            <td>{{$election->candidates->count()}}</td>
                            <td>{{$election->voters->count()}}</td>
                            <td>{{$election->voters()->whereNotNull('election_voter.candidate_id')->count()}}</td>
                            @if($election->end_date<\Carbon\Carbon::today('Asia/Colombo'))
                                <td>finished </td>
                            @elseif($election->end_date===\Carbon\Carbon::today('Asia/Colombo'))
                                @if($election->end_time<=\Carbon\Carbon::now('Asia/Colombo'))
                                    <td>Finished </td>
                                    @endif
                            @else
                            <td>Draft</td>
                            @endif


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
