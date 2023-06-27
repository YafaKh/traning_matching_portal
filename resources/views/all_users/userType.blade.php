<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matching Portal - User Type </title>
  <!-- website icon -->
  <link rel="icon" href="{{asset('images/logo.png')}}">
  <!-- bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- css page -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="body">
  <div class="bigDiv">
    <div class="headingDiv">
      <h1 class="heading">Welcome to Matching Portal</h1>
      <img src="{{asset('images/logo_title.png')}}" alt="logo" class="UserPagelogo">

      <img src="{{asset('images/loginImg.png')}}" alt="login Image" class="imgElement">
    </div>
    <div class="loginForm">
      <div class="card border-0 bg-transparent d-flex align-items-center ">
        <div class="card-body userTypeCard">
            <h2 class="card-title text-center">Who are you ?</h2>
              <form>
                <div class=" d-flex flex-column">
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'admin'])}}" role="button">
                    <h1>ِAdmin</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'student'])}}" role="button">
                    <h1>Student</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'company_employee'])}}" role="button">
                    <h1>Company Employee</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'university_employee'])}}" role="button">
                    <h1>University Employee</h1>
                </a>  
              

                </div>
              </form>
        </div>
      </div>
    </div>
  </div>

  <!-- bootstrap 5.2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <!-- js page -->
  <script src="main.js"></script>
</body>

</html>