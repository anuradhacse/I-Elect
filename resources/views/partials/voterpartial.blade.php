<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Voter name</th>
        <th>Email</th>
        <th>Voted</th>
        <th>Action</th>

    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>Voter name</th>
        <th>Email</th>
        <th>Voted</th>
        <th>Action</th>

    </tr>
    </tfoot>
    <tbody>

    @foreach($voters as $voter)
        <tr>
            <td>{{$voter->name}}</td>
            <td>{{\App\User::where('id',$voter->user_id)->first()->email}}</td>
            @if($election->voters()->findOrFail($voter['id'])->pivot->candidate_id==null)
                <td class="alert-danger"><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Not Voted</td>
            @else
                <td class="alert-success"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Voted</td>
            @endif
            <td>{!! Form::open(['method'=>'DELETE','action' => ['VoterController@delete', $voter->id]])  !!}
                {!! Form::hidden('election_id',$id) !!}
                <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                {!! Form::close() !!}</td>


        </tr>

    @endforeach


    </tbody>
</table>