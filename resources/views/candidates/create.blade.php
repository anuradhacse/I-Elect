@extends('layouts.app')

@section('head')
<<<<<<< HEAD
   @include('partials.navcsspartial')


@endsection

@section('content')

            <div class="col-md-10 col-md-offset-1">
                <div class="panel with-nav-tabs panel-info ">
                    @include('partials.navpartial')

                    <div class="panel-body">
                        {!! Form::open(['action'=>'CandidateController@store','files'=>true]) !!}

                                <!-- this is the election id of current election where this candidate is participating-->
                        {!! Form::hidden('election_id',$id) !!}
=======
    <style>
        .form-group{


            padding-left: 10%;
            padding-right: 5%;

        }

    </style>
@stop

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Voters Dashboard | Eligible Elections | View Candidate </div>

                    <div class="panel-body">
                        {!! Form::open(['action'=>'CandidateController@store','files'=>true]) !!}
>>>>>>> 3eed0ff24e20170dca0cdb1ec39b1e59cc0d45a7
                        <div class="form-group">

                            {!! Form::label('name','Name Of the Candidate:') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Email','Email:') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('des','Description:') !!}
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('des','Image:') !!}
                            {!! Form::file('image_path') !!}

                        </div>


                        <div class="form-group">


                            {!! Form::submit('Add Candidate',['class' => 'btn btn-primary form-control']) !!}
<<<<<<< HEAD
                            {!! Form::close() !!}
                            @include('errors.errorlist')
                                    <br>
                            <hr color="red" />
                                    <!-- dispaly CANDIDATES who have already added-->

                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Voter name</th>
                                    <th>Email</th>
                                    <th>Valid Email</th>
                                    <th>Voted</th>
                                    <th>Password</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Voter name</th>
                                    <th>Email</th>
                                    <th>Valid Email</th>
                                    <th>Voted</th>
                                    <th>Password</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($candidates as $candidate)
                                    <tr>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->name}}</td>
                                        <td>{{$candidate->name}}</td>

                                    </tr>

                                @endforeach



                                </tbody>
                            </table>
=======
>>>>>>> 3eed0ff24e20170dca0cdb1ec39b1e59cc0d45a7

                        </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD



            <script type="text/javascript">

                $(document).ready(function() {
                    $('#example').DataTable();
                } );
            </script>



@endsection
=======
        </div>
        @include('errors.errorlist')
    </div>


    {!! Form::close() !!}


@stop
>>>>>>> 3eed0ff24e20170dca0cdb1ec39b1e59cc0d45a7
