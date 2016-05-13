@extends('layouts.app')

@section('head')
    <style>
        .with-nav-tabs.panel-info .nav-tabs > li > a,
        .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
            color: #31708f;
        }
        .with-nav-tabs.panel-info .nav-tabs > .open > a,
        .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
        .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
            color: #31708f;
            background-color: #bce8f1;
            border-color: transparent;
        }
        .with-nav-tabs.panel-info .nav-tabs > li.active > a,
        .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
            color: #31708f;
            background-color: #fff;
            border-color: #bce8f1;
            border-bottom-color: transparent;
        }
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
            background-color: #d9edf7;
            border-color: #bce8f1;
        }
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
            color: #31708f;
        }
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
            background-color: #bce8f1;
        }
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
        .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: #31708f;
        }
        .panel-heading{
            height:53px;
        }
        .form-group{


            padding-left: 10%;
            padding-right: 5%;

        }

    </style>
@endsection

@section('content')


            <div class="col-md-10 col-md-offset-1">
                <div class="panel with-nav-tabs panel-info ">

                    <div class="panel-heading">
                        <ul class="nav nav-tabs ">
                            <li class="active"><a href="#tab1info" data-toggle="tab">Elections</a></li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">{{$election->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <!-- remove data-toggle="tab" otherwise href will not work -->
                                    <li><a href="#tab4info" data-toggle="tab">Edit Election</a></li>
                                    <li><a href="{{action('VoterController@create',$election->id)}}" >Add Voters</a></li>
                                    <li><a href="{{action('CandidateController@create')}}" >Add Candidates</a></li>
                                    <li><a href="#tab5info" data-toggle="tab">Finalize</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="#" >Activity Log</a></li>
                        </ul>
                    </div>

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