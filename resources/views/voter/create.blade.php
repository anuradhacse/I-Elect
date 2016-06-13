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
                        @include('partials.voterformpartial')
                    @include('errors.errorlist')
                        @else
                        This Election is Finalized.Cannot add Voters!!
                        @endif

                    <hr>


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