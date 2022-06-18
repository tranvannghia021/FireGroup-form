<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <div class="header">
       @include('layouts.header')
    </div>
    
    <div class="wrapper">
        @yield('content')
    </div>
    <script src="{{asset('assets/js/validate.js')}}"></script>
    <script src="{{asset('assets/js/form.js')}}">
   
    </script>
</body>
</html>