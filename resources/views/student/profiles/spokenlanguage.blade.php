<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MP : Matching Portal</title>
  <!-- website icon -->
  <link rel="icon" href="../img/logo.png">
  <!-- bootstrap 5.2 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!--fontawesome-->
  <link rel="stylesheet" href="../vendor/css/all.min.css">
  <!-- css page -->
  <link rel="stylesheet" href="../style2.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-light nav p-3">

    <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="logo" class="logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex flex-end nav-items" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Profile</a><!-- active -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Messaging</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">My progress</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">My company</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Logout</a>
        </li>
      </ul>
    </div>

  </nav>

  <section class="profileSection">
    <div class="studentHeader">
      <h1>studentName*</h1>
      <img src="../img/userImg.png" alt="student Image">
    </div>
      
    <section class="profileSection studentGeneralInfo profileSection studentGeneralInfo ms-1 mt-5">
      <!-- start of diff part (header) -->
            <h2 class="GeneralInfoHeader">Spoken language</h2>  
            <div class="skill">
              <p>Arabic</p>
              <input type="range" min="1" max="100" value="50" class="w-25">
            </div>
            <div class="skill">
              <p>English</p>
              <input type="range" min="1" max="100" value="50" class="w-25">
            </div>
              <!-- end of diff part (header) -->

   
      <a class="btn btn-outline-primary m-5" href="#" role="button"><i class="fa-solid fa-circle-arrow-left"></i><span class="ms-2">Back</span></i></a>

       </section>


  <!-- bootstrap 5.2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <!-- js page -->
  <script src="main.js"></script>
</body>

</html>