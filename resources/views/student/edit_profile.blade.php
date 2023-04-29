@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')

  <section class="profileSection">
    <div class="studentHeader">
      <h1><input class="form-control form-control w-25 opacity-75" type="text" placeholder="Student Name"
          aria-label=".form-control-lg example">


      </h1>
      <img src="{{asset('images/userImg2.png')}}" alt="student Image">

      <div class="uploadImge">
        <input type="file" name="changeImage" id="" class="changeImage">
        <i class="fa-solid fa-camera fa-xl"></i>

      </div>
    </div>
    <div class="studentInfos">
      <!-- in placeholder inputs the info will appears to make the user able to change them -->
      <input class="form-control form-control w-25 studentInfo" type="text" placeholder="specialization : CS"
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
      <h1>Work experience <i class="fa-solid fa-plus text-primary"></i></h1>
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

          <!-- <div class="anWorkExperience mt-5 ">
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
        </div> -->
        </div>
      </div>

  </section>
  <section class="profileSection studentGeneralInfo">
    <h2 class="GeneralInfoHeader">General information</h2>
    <div>
      <input type="text" class="form-control ms-5 w-25 mb-4" id="new_skill" placeholder="Number of passed hour">
      <div class="input-group ms-5 w-25 my-4">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="yes" selected>Female</option>
          <option value="no">Male</option>

        </select>
      </div>
      <input type="text" class="form-control ms-5 my-4 w-25" id="new_skill" placeholder="GPA">
    </div>
  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Skills <i class="fa-solid fa-plus text-primary"></i>
    </h2>
    <div class="skill">
      <a class="ms-5" href="#" role="button"><i class="fa-solid fa-trash-can text-danger"></i>
      </a>

      <p class="ps-2 w-25">Lorem, ipsum:</p>
      <!-- <i class="bi bi-trash3 fs-6 text-danger float-start"></i> -->
      <input type="range" min="1" max="100" value="75" class="w-25">
    </div>

    <div class="skill">
      <a class="ms-5" href="#" role="button"><i class="fa-solid fa-trash-can text-danger"></i>
      </a>
      <p class="ps-2 w-25">Lorem, ipsum:</p>

      <!-- <i class="bi bi-trash3 fs-6 text-danger float-start"></i> -->

      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="skill d-inline">
      <!-- <div class="input-group ms-5 mt-4 w-25"> -->
      <!-- <span class="input-group-text"><i class="bi bi-plus-square fs-6"></i></span>
      <input type="text" class="form-control ps-4" id="new_address" placeholder="New address">
      <input type="range" min="1" max="100" value="50" class="w-75 ms-5"> -->
      <div class="d-flex flex-row mb-3">

        <input type="text" class="form-control ms-5 w-25" id="new_skill" placeholder="New skill">
        <div class="ms-2 w-50">

          <input type="range" min="1" max="100" value="50" class="ms-3 w-50 mt-2">
        </div>

      </div>

    </div>

    </div>

  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Spoken language <i class="fa-solid fa-plus text-primary"></i></h2>
    <div class="skill">
      <p>Arabic</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="skill">
      <p>English</p>
      <input type="range" min="1" max="100" value="50" class="w-25">
    </div>
    <div class="d-flex flex-row mb-3">

      <input type="text" class="form-control ms-5 w-25" id="new_skill" placeholder="New language">
      <div class="ms-2 w-50">

        <input type="range" min="1" max="100" value="50" class="ms-3 w-50 mt-2">
      </div>

    </div>

  </section>

  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info"><!--there is another potintioal ansowers-->
      <h3>Am I in contact with a specific company:</h3>
      <div class="input-group w-25 studentInfo">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="no" selected>No</option>
          <option value="yes">Yes</option>

        </select>
      </div>
    </div>
    <div class="info">
      <h3>Company information:</h3>

      <textarea name="expDescription" id="expDescription" cols="40" rows="5" class=" overflow-auto mb-2"></textarea>
    </div>
    <div class="info">
      <h3>Preferred city for training:</h3>
      <div class="input-group w-25 studentInfo">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="no" selected>--</option>
          <option value="yes">Jenin</option>
          <option value="yes">Nablus</option>

        </select>
      </div>
      <div class="row">
        <div class="selected-box">Jenin </div>
        <div class="selected-box">Nablus </div>
      </div>
    </div>
    <div class="info">
      <h3>Preferred companies:</h3>

      <div class="input-group w-25 studentInfo">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="no" selected>--</option>
          <option value="yes">Asal</option>
          <option value="yes">exalt</option>

        </select>
      </div>
      <div class="row">
        <div class="selected-box">X </div>


      </div>
    </div>
    <div class="info">
      <h3>preferred training field:</h3>

      <div class="input-group w-25 studentInfo">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="no" selected>--</option>
          <option value="yes">mobile application</option>
          <option value="yes">Web -front end</option>

        </select>
      </div>
      <div class="row">
        <div class="selected-box">Web -front end </div>


      </div>
    </div>
    <div class="info">
      <h3>when available:</h3>
      <div class="input-group date w-25 mb-2" id="datepicker">
        <input type="text" class="form-control " placeholder="Date">
        <span class="input-group-append">
          <span class="input-group-text bg-white">
            <i class="fa fa-calendar"></i>
          </span>
        </span>
      </div>
  </section>
  </div>

  <div class="text-center d-flex col-md-5 mx-auto">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" type="button">Save</button>
    <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">cancel</button>
  </div>
@endsection