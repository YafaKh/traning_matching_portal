@extends('student.layout.master')
@section('content')
  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <section class="registerSection">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>

    <div class="registerField">
      <label for="" class="mt-3 mb-3"> Skills</label>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        <div class="col d-flex justify-content-center">
          <input type="range" min="1" max="100" value="30" class="w-75" />
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        <div class="col d-flex justify-content-center">
          <input type="range" min="1" max="100" value="50" class="w-75" />
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        <div class="col d-flex justify-content-center">
          <input type="range" min="1" max="100" value="75" class="w-75" />
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        <div class="col d-flex justify-content-center">
          <input type="range" min="1" max="100" value="50" class="w-75" />
        </div>
      </div>
      <div class="form-floating my-5">
        <input type="text" class="form-control" id="floatingInput" placeholder="else" />
        <label for="floatingInput">else</label>
      </div>
    </div>
    <div class="registerField pt-4">
      <div class="form-floating mb-4 uploadImage">
        <input type="link" class="form-control" id="floatingInput" placeholder="Linkedin" />
        <label for="floatingInput" class="ms-5">Linkedin</label>
        <i class="fa-solid fa-link imgicon"></i>
      </div>
      <div class="form-floating mb-4">
        <input type="number" class="form-control" id="floatingInput" placeholder="Number of semester hours" />
        <label for="floatingInput">Number of semester hours (without internship)</label>
      </div>

      <div class="form-floating mb-4">
        <textarea name="expDescription" id="expDescription" cols="55" rows="7" placeholder="Experience ( optional )"
          class="overflow-auto"></textarea>
      </div>

      <div class="form-floating ms-4 mb-4 gx-5">
        <div class="me-4">
          <label for="">Are you in contact with a specific company?</label>
        </div>
        <div class="d-flex flex-row">
        <div class="form-check ms-2 my-3">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
          <label class="form-check-label" for="flexRadioDefault1">
            Yes
          </label>
        </div>
        <div class="form-check ms-5 my-3">
          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
          <label class="form-check-label" for="flexRadioDefault2"> No </label>
        </div>
        </div>
      </div>
      <!-- if Yes the user can choose from these dropdowns:  -->
      <div class="form-floating mb-4 row">
        <select class="form-select col mx-2" id="inputGroupSelect01">
          <!--here the user can choose multi value-->
          <option value="no" selected>Company name</option>
          <option value="yes">Asal</option>
          <option value="yes">exalt</option>
        </select>
        <select class="form-select col mx-3" id="inputGroupSelect01">
          <!--here the user can choose multi value-->
          <option value="no" selected>Company branch</option>
          <option value="yes">Jenin</option>
          <option value="yes">Nablus</option>
        </select>
      </div>
      <div class="form-floating mb-4 row">
        <select class="form-select col mx-2" id="inputGroupSelect01">
          <!--here the user can choose multi value-->
          <option value="no" selected>Preferred company/s</option>
          <option value="yes">Asal</option>
          <option value="yes">exalt</option>
          <option value="yes">nothing</option>
        </select>
        <div class="row">
          <div class="selected-box">Asal</div>
          <div class="selected-box">exalt</div>
        </div>
      </div>
      <div class="form-floating mb-4 row">
        <select class="form-select col mx-2" id="inputGroupSelect01">
          <!--here the user can choose multi value-->
          <option value="no" selected>Preferred city/ies</option>
          <option value="yes">Jenin</option>
          <option value="yes">Nablus</option>
          <option value="yes">nothing</option>
        </select>
        <div class="row">
          <div class="selected-box">Jenin</div>
        </div>
      </div>
      <div class="mb-4">
        <label>when available:</label>
        <div class="input-group form-floating" id="datepicker">
          <input type="date" class="form-control" placeholder="Date" />
        </div>
      </div>
    </div>
    <div class="registerField">
      <label for="" class="mt-3 mb-3"> Preferred training field :</label>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
      </div>
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
      </div>
      <div class="form-floating my-5">
        <input type="text" class="form-control mb-5" id="floatingInput" placeholder="else" />
        <label for="floatingInput">else</label>
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
@endsection