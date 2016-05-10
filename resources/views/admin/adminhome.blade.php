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

    </style>
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">

        <div class="panel with-nav-tabs panel-info ">

            <div class="panel-heading">

                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#tab1info" data-toggle="tab">Elections</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="{!! url('/elections/create') !!}" >Create New Election</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#tab4info" data-toggle="tab">Info 4</a></li>
                            <li><a href="#tab5info" data-toggle="tab">Info 5</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

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

    <script type="text/javascript">

        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection
