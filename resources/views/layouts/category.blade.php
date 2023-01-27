
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/jumbotron.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/blog.css')}}" rel="stylesheet">
</head>

<body>


<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to download -->

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @yield('content')
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<x-footer></x-footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>
</html>
