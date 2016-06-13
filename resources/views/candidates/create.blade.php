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

                @include('partials.candidatepartial')

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