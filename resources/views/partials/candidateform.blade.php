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
</div>
{!! Form::close() !!}