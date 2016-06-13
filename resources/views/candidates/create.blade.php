@extends('layouts.app')

@section('head')
    @include('partials.navcsspartial')


@endsection

@section('content')

    <div class="col-md-10 col-md-offset-1">
        <div class="panel with-nav-tabs panel-info ">
            @include('partials.navpartial')

            <div class="panel-body">
                @if(!$election->finalize)
                    @include('partials.candidateform')
                    @include('errors.errorlist')

                    @else
                    This is Finalized Election.Cannot add Candidates!!
                    @endif


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