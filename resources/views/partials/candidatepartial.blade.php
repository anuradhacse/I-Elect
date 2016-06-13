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
            <td><img src="{{asset('uploads/'.$candidate->image_path)}}" style="width: 50px;height: 50px"></td>
            <td>{!! Form::open(['method'=>'DELETE','action' => ['CandidateController@delete', $candidate->id]])  !!}
                {!! Form::hidden('election_id',$id) !!}
                <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                {!! Form::close() !!}</td></td>

        </tr>

    @endforeach



    </tbody>
</table>