<!DOCTYPE html>
<html>
<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
    <meta charset="utf-8" />
    <meta name="_token" content="<?= csrf_token(); ?>" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link media="all" type="text/css" rel="stylesheet" href="/css/flash.css">
    <link media="all" type="text/css" rel="stylesheet" href="/css/home.css">
    <script src="/js/project.js"></script>
</head>
<body>
<div class="container">
    @include('navigation.index')
    @include('flash_data')
    @yield('content')
    @include('footer')
</div>
</body>
</html>

