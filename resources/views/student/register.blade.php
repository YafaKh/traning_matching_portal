@extends('student.layout.master')
@section('content')

  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <section class="registerSection">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>

    <form action="" method="post">
    <div class="m-5">
      <label for="" class="mt-3 mb-3"> Name (Arabic)</label>
      <div class="row g-2">
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="First" />
          <label for="floatingInput">First</label>
        </div>
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Second" />
          <label for="floatingInput">Second</label>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Third" />
          <label for="floatingInput">Third</label>
        </div>
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Last" />
          <label for="floatingInput">Last</label>
        </div>
      </div>
    </div>
    <div class="m-5">
      <label for="" class="mt-3 mb-3"> Name (English)</label>
      <div class="row g-2">
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="First" />
          <label for="floatingInput">First</label>
        </div>
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Second" />
          <label for="floatingInput">Second</label>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Third" />
          <label for="floatingInput">Third</label>
        </div>
        <div class="form-floating col-md mb-4">
          <input type="text" class="form-control" id="floatingInput" placeholder="Last" />
          <label for="floatingInput">Last</label>
        </div>
      </div>
      </div>
      <div class="m-5">
      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="StudentID" />
        <label for="floatingInput">StudentID</label>
      </div>
      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="Phone number" />
        <label for="floatingInput">Phone number</label>
      </div>
      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="University text" />
        <label for="floatingInput">University text</label>
      </div>
      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="Permanent residence address " />
        <label for="floatingInput">Permanent residence address </label>
      </div>

    <div class="form-floating mb-4">
      <select class="form-select" id="inputGroupSelect01">
        <!--here the user can choose multi value-->
        <option value="no" selected>Language</option>
        <option value="yes">English</option>
        <option value="yes">Arabic</option>
      </select>
    </div>
    <div class="form-floating ms-4 mb-4 d-flex flex-row gx-5">
      <div class="col"><label for="">Gender</label></div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked/>
        <label class="form-check-label" for="flexRadioDefault1">
          Female
        </label>
      </div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" />
        <label class="form-check-label" for="flexRadioDefault2">
          Male
        </label>
      </div>
    </div>

    <div class="form-floating mb-4">
      <select class="form-select" id="inputGroupSelect01">
        <!--here the user can choose multi value-->
        <option value="no" selected>Specialization</option>
        <option value="yes">English</option>
        <option value="yes">French</option>
      </select>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="floatingInput" placeholder="GPA" />
      <label for="floatingInput">GPA</label>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="floatingInput" placeholder="Number of passed hour" />
      <label for="floatingInput">Number of passed hour</label>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" />
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="floatingInput" placeholder="Confirm password" />
      <label for="floatingInput">Confirm password</label>
    </div>
    
      <div class="uploadImage">
        <input type="file" class="form-control SetImage " id="inputGroupFile01">

          <input type="text" class="form-control" id="floatingInput" placeholder="         Personal image" />
          <i class="fa-solid fa-link imgicon"></i>
      
      </div>
  </div>
 
  </section>
  <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
      Submit
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
  </form>
@endsection