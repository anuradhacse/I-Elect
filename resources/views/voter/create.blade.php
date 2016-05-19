@extends('layouts.app')

@section('head')
  @include('partials.navcsspartial')
@endsection

@section('content')


            <div class="col-md-10 col-md-offset-1">
                <div class="panel with-nav-tabs panel-info ">

                @include('partials.navpartial')

                    <div class="panel-body">
                        {!! Form::open(['action'=>'VoterController@store']) !!}
                        <!-- this is the election id of current election where this voter is going to vote -->
                        {!! Form::hidden('election_id',$id) !!}
                        <div class="form-group">

                            {!! Form::label('name','Name Of the Voter:') !!}
                            {!! Form::text('name',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Email','Email:') !!}
                            {!! Form::email('email',null,['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group">

                            {!! Form::label('Password','Password:') !!}
                            {!! Form::password('password',['class'=>'form-control']) !!}

                        </div>

                        <div class="form-group">


                            {!! Form::submit('Add voter',['class' => 'btn btn-primary form-control']) !!}
                            {!! Form::close() !!}
                            <hr>
                            @include('errors.errorlist')

                            <!-- dispaly voters who have already added-->

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

                                @foreach($voters as $voter)
                                    <tr>
                                        <td>{{$voter->name}}</td>
                                        <td>{{$voter->name}}</td>
                                        <td>{{$voter->name}}</td>
                                        <td>{{$voter->name}}</td>
                                        <td>{{$voter->name}}</td>
                                        <td>{{$voter->name}}</td>

                                    </tr>

                                @endforeach



                                </tbody>
                            </table>

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