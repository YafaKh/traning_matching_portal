<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    {{-- Bootstrap JS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    {{-- Bootstrap ICONS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- our custom style sheet --}}
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">

</head>
<body class="bg-sand"> 
    {{--navbar--}}
    <nav class="navbar navbar-expand-sm border-buttom">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="#" >
        <img src="{{asset('images/logo.png')}}" alt="Logo">
        EmployeeName*
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle @yield('activity1')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Students
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">List students</a></li>
                <li><a class="dropdown-item" href="#">Students' accounts approval</a></li>
                <li><a class="dropdown-item" href="#">Student-Company approval</a></li>
                <li><a class="dropdown-item" href="#">Assign supervisors</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('activity2')" href="#">Supervisors</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('activity3')" href="#">Companies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('activity4')" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    @yield('student_navbar')
    @yield('content')

{{-- Bootstrap CSS CDN --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>