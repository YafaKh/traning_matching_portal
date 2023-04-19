<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MP : Matching Portal</title>
  {{--body font--}}
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <!-- website icon -->
  <link rel="icon" href="../img/logo.png">
  <!-- bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!--fontawesome-->
  <link rel="stylesheet" href="../vendor/css/all.min.css">
  <!-- css page -->
  {{-- our custom style sheet --}}
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
  </head>

<body  class="bg-sand">
    @yield('navbar')
    @yield('content')
<!-- bootstrap 5.2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <!-- js page -->
  <script src="main.js"></script>
</body>

</html>