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
</div>