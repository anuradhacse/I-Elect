@extends('layouts.app')

@section('head')
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
                    {!! Form::close() !!}
                    @include('errors.errorlist')
                    <br>
                    <hr color="red" />
                    <!-- dispaly CANDIDATES who have already added-->

                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Candidate Name</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Candidate Name</th>
                            <th>Email</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($candidates as $candidate)
                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->email}}</td>
                                <td>{{$candidate->description}}</td>
                                <td><img src="{{asset('uploads/'.$candidate->image_path)}}" ></td>
                                <td>{!! Form::open(['method'=>'DELETE','action' => ['CandidateController@delete', $candidate->id]])  !!}
                                    {!! Form::hidden('election_id',$id) !!}
                                    <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                    {!! Form::close() !!}</td></td>

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