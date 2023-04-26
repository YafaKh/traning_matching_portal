@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')
<section class="profileSection">
    <div class="studentHeader">
      <h1>studentName*</h1>
      <img src="../img/userImg.png" alt="student Image">
    </div>
    <div class="studentInfos">
      <p class="studentInfo"><i class="fa-solid fa-laptop icon"></i>specialization</p>
      <p class="studentInfo"><i class="fa-solid fa-location-dot icon"></i>Address</p>
      <p class="studentInfo"><i class="fa-solid fa-envelope icon"></i>Email*</p>
      <p class="studentInfo"><i class="fa-solid fa-phone icon"></i>Phone</p>
      <p class="studentInfo"><i class="fa-brands fa-linkedin icon"></i>Linkedin</p>
      <a class="btn editBtn" href="#" role="button">Edit Profile</a>

    </div>
  </section>
  <section class="profileSection">
    <div class="workExperience">
      <h1>Work experience</h1>
      <div class="mt-4">
        <div class="anWorkExperience">
          <div class="goldenDiv"></div>
          <div class="anWorkExperienceInfo">
            <h2 class="expName">Freelance UX/UI designer</h2>
            <p>Lorem ipsum</p>
            <p>Jun 2022 — Present</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus eros eu
              vehicula interdum. Cras nec ultricies massa. Curabitur rutrum, diam id consequat consequat </p>
          </div>

        </div>
        <div class="anWorkExperience">
          <div class="blueDiv"></div>
          <div class="anWorkExperienceInfo">
            <h2 class="expName">Freelance UX/UI designer</h2>
            <p>Lorem ipsum</p><!--workPlace-->
            <p>Jun 2022 — Present</p><!--date-->
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus eros eu
              vehicula interdum. Cras nec ultricies massa. Curabitur rutrum, diam id consequat consequat </p>
            <!--expDescription-->
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">General information</h2>
    <p>Gender: Female</p><!--Gender-->
    <p>GPA : 4.00</p><!--GPA-->
    <p>number of passed hours : 115</p><!--# of passed hours-->


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
  <!-- if there is no athor skills or languages the button will disabled  -->

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


  </section>

@endsection