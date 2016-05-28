<div class="panel-heading">

    <ul class="nav nav-tabs ">
        <li class="active"><a href="{{action('ElectionController@show',$election->id)}}" >Elections</a></li>

        <li class="dropdown">
            <a href="#" data-toggle="dropdown">{{$election->name}} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <!-- remove data-toggle="tab" otherwise href will not work -->
                <li><a href="{{action('ElectionController@edit',$election->id)}}">Edit Election</a></li>
                <li><a href="{{action('VoterController@create',$election->id)}}" >Add Voters</a></li>
                <li><a href="{{action('CandidateController@create',$election->id)}}" >Add Candidates</a></li>
                <li><a href="{{action('ElectionController@finalize',$election->id)}}" >Finalize</a></li>
            </ul>
        </li>
        <li><a href="{{action('ElectionController@results',$election->id)}}">Results</a></li>
        <li><a href="#" >Activity Log</a></li>
    </ul>
</div>