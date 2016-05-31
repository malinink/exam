    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title>User - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
        <p align="center">USERS</p>
        @show

        <div class="Users">
            @if (Session::has('flash_message'))
        <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
            @endif
            @yield('content')
        </div>
    </body>
</html>


