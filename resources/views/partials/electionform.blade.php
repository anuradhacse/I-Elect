
<div class="form-group">

    {!! Form::label('name','Name Of the Election:') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!! Form::label('details','Details:') !!}
    {!! Form::textarea('details',null,['class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!! Form::label('date','Starting date:') !!}
    {!! Form::input('date','start_date',date('Y-m-d'),['class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!! Form::label('time','Starting time:') !!}
    {!! Form::input('time','start_time',time('H-m-s'),['class'=>'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('date','Ending date:') !!}
    {!! Form::input('date','end_date',date('Y-m-d'),['class'=>'form-control']) !!}

</div>
<div class="form-group">

    {!! Form::label('time','Ending time:') !!}
    {!! Form::input('time','end_time',time('H-m-s'),['class'=>'form-control']) !!}

</div>
<div class="form-group">


    {!! Form::submit($submitBtnName,['class' => 'btn btn-primary form-control']) !!}


</div>