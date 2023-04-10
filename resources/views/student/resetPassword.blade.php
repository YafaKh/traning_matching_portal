<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Matching Portal - Reset Password </title>
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
      <img src="{{asset('images/logo_title.png')}}" alt="logo" class="logo">

      <img src="{{asset('images/loginImg.png')}}" alt="login Image" class="imgElement">
    </div>
    <div class="loginForm">
      <div class="card border-0 bg-transparent d-flex align-items-center ">
        <div class="card-body loginCard">
            <h2 class="card-title text-center mb-5 mt-3">Reset Password</h2>
            <form>
                  <div class="mb-3">
                    <input type="email" class="form-control loginInput" placeholder="Email">
                    <input type="password" class="form-control loginInput" placeholder="Password">
                    <input type="password" class="form-control loginInput" placeholder="Confirm password">
                    <input class="btn resetbtn" type="submit" value="Reset ">
                    <input class="btn resetbtn" type="button" value="Back ">
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