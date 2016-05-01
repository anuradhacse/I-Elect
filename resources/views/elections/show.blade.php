<!doctype html>
<html>
<head>
    <title>
        Document
    </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
<div class="container">
    @if(Session::has('flash_message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}

        </div>
    @endif
    @yield('content')

        <h1>
            Your Elections
        </h1>

        <hr/>

        @foreach($elections as $election)

            <article>
                <!-- this is a better way to make href..other one will make problems   -->
                <h2>  {{ $election->name}} </h2>
            </article>
        @endforeach
</div>


<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@yield('footer')
</body>



</html>

