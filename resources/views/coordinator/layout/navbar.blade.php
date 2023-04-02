<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<body> 
    <!--navbar-->
    <nav class="navbar navbar-expand-sm bg-body-tertiary">
    <div class="container-fluid w-75 d-flex justify-content-center">
        <a class="navbar-brand" href="#">
        <img src="{{asset('images/logo.png')}}" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
        EmployeeName*
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <a class="nav-link" href="#">Supervisors</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Companies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>