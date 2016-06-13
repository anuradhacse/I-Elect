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

                    @include('partials.voterpartial')

                </div>
            </div>
        </div>
    </div>






    <script type="text/javascript">

        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

@endsection