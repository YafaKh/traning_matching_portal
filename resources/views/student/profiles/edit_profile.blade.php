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

  <!-- date picker -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <!-- end date picker -->

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
    <div class="collapse navbar-collapse nav-items" id="navbarNav">
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
      <h1><input class="form-control form-control w-25" type="text" placeholder="Student Name"
          aria-label=".form-control-lg example">
      </h1>
      <img src="../img/userImg.png" alt="student Image">

      <div class="uploadImge">
        <input type="file" name="changeImage" id="" class="changeImage">
        <i class="fa-solid fa-camera fa-xl"></i>

      </div>
    </div>
    <div class="studentInfos">
      <input class="form-control form-control w-25 studentInfo" type="text" placeholder="specialization"
        aria-label=".form-control-lg example">
      <div class="input-group w-25 studentInfo">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option selected>Address</option>
          <option value="1">Jenin</option>
          <option value="2">Nablus</option>
          <option value="3">Ramallah</option>
        </select>
      </div>



      <input class="form-control form-control w-25 studentInfo" type="email" placeholder="Email"
        aria-label=".form-control-lg example">
      <!-- الفون هو بدخلو عادي واحنا منقسمو ولا بدخل الكود اريا وهي القصص ومنحطهم بالداتا بيس ؟ -->
      <input class="form-control form-control w-25 studentInfo" type="text" placeholder="Phone"
        aria-label=".form-control-lg example">
      <input class="form-control form-control w-25 studentInfo" type="text" placeholder="Linkedin"
        aria-label=".form-control-lg example">
      <a class="text-decoration-none changePassword" href="#">Change password</a>

    </div>

  </section>
  <section class="profileSection studentSkills overflow-auto">
    
    <div class="workExperience pb-3">
      <h1>Work experience</h1>

      <div class="mt-4">
        <div class="anWorkExperience mb-5">
          <div class="goldenDiv"></div>
          <div class="anWorkExperienceInfo">
            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Your Position"
              aria-label=".form-control-lg example">
            <input class="form-control mb-2  w-75" type="text" placeholder="Work place"
              aria-label="default input example">

            <div class="input-group date w-75 mb-2" id="datepicker">
              <input type="text" class="form-control " placeholder="Date">
              <span class="input-group-append">
                <span class="input-group-text bg-white">
                  <i class="fa fa-calendar"></i>
                </span>
              </span>
            </div>

            <textarea name="expDescription" id="expDescription" cols="52" rows="5"
              class=" overflow-auto mb-2"></textarea>
          </div>

        </div>
        <!-- when i click on the button this section will ba appeare and if i click again new section will appeare and so 
  -the margin here different than the section apove
- and the colered div different once golden and next blue-->

        <div class="anWorkExperience mt-5 ">
          <div class="blueDiv"></div>
          <div class="anWorkExperienceInfo">
            <input class="form-control form-control-lg mb-2 w-75" type="text" placeholder="Your Position"
              aria-label=".form-control-lg example">
            <input class="form-control mb-2 w-75" type="text" placeholder="Work place"
              aria-label="default input example">
              <div class="input-group date w-75 mb-2" id="datepicker">
                <input type="text" class="form-control " placeholder="Date">
                <span class="input-group-append">
                  <span class="input-group-text bg-white">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
              </div>
             <textarea name="expDescription" id="expDescription" cols="52" rows="5"
              class=" overflow-auto mb-2"></textarea>
          </div>
        </div>
      </div>
    </div>
    
  </section>
  <section class="profileSection studentGeneralInfo">
    <h2 class="GeneralInfoHeader">General information</h2>
    <div class="input-group aGeneralInfo">
      <span class="input-group-text w-75 justify-content-center" id="inputGroup-sizing-default">Number of passed hour</span>
      <input type="text" class="form-control w-25" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="0">
    </div>
<div class="input-group aGeneralInfo">
  <span class="input-group-text w-75 justify-content-center" id="inputGroup-sizing-default">Gender</span>
  <div class="gender">
 
  <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
    <label class="form-check-label" for="flexRadioDefault2">
      Male
    </label>
  </div>
   <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
    <label class="form-check-label" for="flexRadioDefault1">
      Female
    </label>
  </div>
</div>
</div>
<div class="input-group aGeneralInfo">
  <span class="input-group-text w-75 justify-content-center" id="inputGroup-sizing-default">GPA</span>
  <input type="text" class="form-control w-25 d-flex justify-content-center" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="0.0">
</div>



  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Skills</h2>
    <div class="skill">
      <p>Lorem, ipsum:</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="skill">
      <p>Lorem, ipsum:</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="skill">
      <p>Lorem, ipsum:</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>



  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Spoken language</h2>
    <div class="skill">
      <p>Arabic</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="skill">
      <p>English</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>


  </section>

  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info"><!--there is another potintioal ansowers-->
      <h3>Am I in contact with a specific company:</h3>
      <p> no</p>
    </div>
    <div class="info">
      <h3>Company information:</h3>
      <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum, tenetur!</p>
    </div>
    <div class="info">
      <h3>Preferred city for training:</h3>
      <p> Nablus ,Jenin</p>

    </div>
    <div class="info">
      <h3>Preferred companies:</h3>
    <p> Asal , exalt</p>
   
    </div>
    <div class="info">
      <h3>preferred training field:</h3>
    <p> mobile appkication</p>
   
    </div>
    <div class="info">
      <h3>when available:</h3>
    <p> Dec-2023</p>
   
    </div>


  </section>

  <script type="text/javascript">
    $(function () {
      $('#datepicker').datepicker();
    });
  </script>
  </script>
  <!-- bootstrap 5.2 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <!-- js date picker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


  <!-- js page -->
  <script src="main.js"></script>
</body>

</html>