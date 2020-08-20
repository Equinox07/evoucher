<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Paddys Dashboard" name="description" />
        <meta content="nnuro" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{mix('/assets/css/bootstrap.css')}}">

    </head>
    <body >
        <div id="app">
            <div  id="layout-wrapper" >
                <router-view></router-view>
            </div>
        </div>
        <script type="text/javascript" src="{{mix('/assets/js/app.js')}}"></script>

    </body>
</html>