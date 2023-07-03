@extends('student.layout.master')
@section('content')

  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <form action="{{route('student_registeration_1.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
  <section class="registerSection d-block " id="shown-section">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>
    <div class="m-5">
      <label for="first_name_ar" class="mt-3 mb-3"> Name (Arabic)</label>
      <div class="row g-2">
        <div class="form-floating col-md mb-3">
          <input type="text" class="form-control" id="first_name_ar" name="first_name_ar" placeholder="First" />
          <label for="first_name_ar">First</label>
          <div class="row">
            @error('first_name_ar')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        
        <div class="form-floating col-md  mb-3">
          <input type="text" class="form-control" id="second_name_ar" name="second_name_ar" placeholder="Second" />
          <label for="second_name_ar">Second</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_name_ar" name="third_name_ar" placeholder="Third" />
          <label for="third_name_ar">Third</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_name_ar" name="last_name_ar" placeholder="Last" />
          <label for="last_name_ar">Last</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
      </div>
    </div>
    <div class="mx-5">
      <label for="first_name_en" class=" mb-3"> Name (English)</label>
      <div class="row g-2">
        <div class="form-floating col-md  mb-3">
          <input type="text" class="form-control" id="first_name_en" name="first_name_en" placeholder="First" />
          <label for="first_name_en">First</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
        <div class="form-floating col-md  mb-3">
          <input type="text" class="form-control" id="second_name_en" name="second_name_en" placeholder="Second" />
          <label for="second_name_en">Second</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_name_en" name="third_name_en" placeholder="Third" />
          <label for="third_name_en">Third</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_name_en" name="last_name_en" placeholder="Last" />
          <label for="last_name_en">Last</label>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        </div>
      </div>
    </div>
      <div class="m-5">
      <div class="form-floating ">
        <input type="text" class="form-control" id="student_num" name="student_num" placeholder="StudentID" />
        <label for="student_num">StudentID</label>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="Studentphone" name="phone" placeholder="Phone number" />
        <label for="Studentphone">Phone number</label>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="StudentEmail" name="email" placeholder="University email" />
        <label for="StudentEmail">University email</label>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </div>
      <div class="form-floating">
        <select class="form-select col mb-4" name="address" id="studentAddress">
        <option value="--" >Permanent residence address</option>
        @foreach($cities as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach

        </select>
      </div>
       <div class="form-floating">

      <div class="form-check">
       
      <div class="row g-2 mb-2">
      @foreach($allLanguages as $allLanguage)

        <div class="form-check">
          <div>
            <input class="form-check-input mt-2 languageName" type="checkbox" value="{{ $allLanguage->id }}" name="language[ $allLanguage->id ]" id="languageName"  />
            <label class="form-check-label fs-5" for="languageName">
            {{ $allLanguage->name }}
            </label>
            </div>
        <div class="levels d-none">
            <div class="skill d-flex flex-row">
            <p class="col-4 mt-4">speaking_level :</p>
            <input type="range" min="1" max="100" value="" name="speaking_level" class="w-50 col-8">
            </div>
            <div class="skill d-flex flex-row">
            <p class="col-4 ">writing_level :</p>
            <input type="range" min="1" max="100" value="" name="writing_level" class="w-50 col-8">
            </div>
            <div class="skill d-flex flex-row">
            <p class="col-4 mb-4">listening_level :</p>
            <input type="range" min="1" max="100" value="" name="listening_level" class="w-50 col-8">
            </div>
        </div>
</div>
@endforeach

<div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      </div>
    <div class="form-floating ms-4 mb-4 d-flex flex-row gx-5">
      <div class="col"><label for="">Gender</label></div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="gender" id="StudentGender1" value="1" checked/>
        <label class="form-check-label" for="StudentGender1">
          Female
        </label>
      </div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="gender" id="StudentGender2" value="0" />
        <label class="form-check-label" for="StudentGender2">
          Male
        </label>
      </div>
      
    </div>
    

    <div class="form-floating mb-4">
      <select class="form-select" id="specialization" name="specialization">
        <!--here the user can choose multi value-->
        <option value="--" selected>Specialization</option>
        @foreach($specializations as $specialization)

        <option value="$specialization->id">{{$specialization->name}}</option>
        @endforeach

      </select>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="gpa" name="gpa" placeholder="GPA" />
      <label for="gpa">GPA</label>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating mb-4">
      <input type="Number" class="form-control" id="passed_hours" name="passed_hours" placeholder="Number of passed hour" />
      <label for="passed_hours">Number of passed hour</label>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
      <label for="password">Password</label>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="cofirmPassword" name="cofirmPassword" placeholder="Confirm password" />
      <label for="cofirmPassword">Confirm password</label>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    
      <div class="uploadImage">
        <input type="file" class="form-control SetImage " name="image" id="studentImage" />

          <input type="text" class="form-control" id="floatingInput" placeholder="         Personal image" />
          <i class="bi bi-link-45deg imgicon "></i>
          <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </div>
</div>
</div>
<div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-50">
    <button id="next" class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
      Next
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
</section>
<section class="registerSection d-none " id="hidden-section">
<div class="registerField">
  <label for="" class="mt-3 mb-3">Skills</label>
  @foreach($skills as $skill)
  <div class="row g-2 ms-3 mb-2">
    <div class="form-check col">
      <input class="form-check-input" type="checkbox" value="{{$skill->name}}" name="skill" id="skillcheckbox{{$loop->index}}" />
      <label class="form-check-label" for="skillcheckbox{{$loop->index}}">
        {{$skill->name}}
      </label>
    </div>
    <div class="col d-flex justify-content-center mt-0">
      <input type="range" min="1" max="100" value="30" name="skillLevel{{$loop->index}}" class="w-75 d-none skillLevel" id="skillLevel{{$loop->index}}" />
    </div>
  </div>
  @endforeach
  <div class="form-floating my-5">
    <input type="text" class="form-control" name="skill" id="floatingInput" placeholder="else" />
    <label for="floatingInput">else</label>
  </div>
</div>
    <div class="registerField pt-4">
      <div class="form-floating mb-4 uploadImage">
        <input type="link" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" />
        <label for="linkedin" class="ms-5">Linkedin</label>
        <i class="bi bi-link-45deg imgicon"></i>
       
      </div>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-floating mb-4">
        <input type="number" class="form-control" id="load" name="load" placeholder="Number of semester hours" />
        <label for="load">Number of semester hours (without internship)</label>
      </div>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-floating mb-4">
        <textarea name="work_experience" id="work_experience" cols="55" rows="7" placeholder="Experience ( optional )"
          class="overflow-auto"></textarea>
      </div>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-floating ms-4 mb-4 gx-5">
        <div class="me-4">
          <label for="">Are you in contact with a specific company?</label>
        </div>
        <div class="d-flex flex-row">
        <div class="form-check ms-2 my-3">
          <label class="form-check-label" for="connected_with_a_company">
          <input class="form-check-input connection-radio" type="radio" value="1" name="connected_with_a_company" id="connected_with_a_company" />
          Yes
          </label>
        </div>
        <div class="form-check ms-5 my-3">
          <label class="form-check-label" for="connected_with_a_company"> 
          <input class="form-check-input connection-radio" type="radio" value="0" name="connected_with_a_company" id="connected_with_a_company" checked />
        No </label>
        </div>
        </div>
      </div>
      <!-- if Yes the user can choose from these dropdowns:  -->
      <div class="form-floating mb-4 row conectedCompany d-none ">
        <select class="form-select col mx-2" id="companiesName" name="companyName" wire:model="selectedCompany">
          <!--here the user can choose multi value-->
          <option value="--">Company name</option>
          @foreach($companies as $company)
          <option value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
        </select>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        <select class="form-select col mx-3 disabled" id="companyBranch" name="companyBranch">
          <!--here the user can choose multi value-->
          <option value="--" selected>Company branch</option>
          @foreach($branches as $branch)
          <option value="{{$branch->id}}">{{$branch->address}}</option>
          @endforeach
        </select>
      </div>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-floating mb-4 row">
        <select class="form-select col mx-2" id="inputGroupSelect01">
          <!--here the user can choose multi value-->
          <option value="--" selected>Preferred company/s</option>
          <option value="yes">Asal</option>
          <option value="yes">exalt</option>
          <option value="yes">nothing</option>
        </select>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        <div class="row">
          <div class="selected-box">Asal</div>
          <div class="selected-box">exalt</div>
        </div>
      </div>
      <div class="form-floating mb-4 row">
        
      <select class="form-select col mx-2" name="cities[]" multiple="multiple" id="inputGroupSelect01">

          <!--here the user can choose multi value-->
          <option value="--" selected>Preferred city/ies</option>
          @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
          @endforeach

        </select>
        <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
        <div class="form-floating mt-5">
        <input type="text" class="form-control mb-5" id="floatingInput" placeholder="else" />
        <label for="floatingInput">else</label>
      </div>
        <div class="row">
          <div class="selected-box">Jenin</div>
        </div>
      </div>
      <div class="mb-4">
        <label>when available:</label>
        <div class="input-group form-floating" id="availability_date">
          <input type="date" class="form-control" name="availability_date" placeholder="Date" />
        </div>
      </div>
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="registerField">
      <label for="" class="mt-3 mb-3"> Preferred training field :</label>
      @foreach($trainingFields as $trainingField)

      <div class="row g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="trainingFields" name="trainingFields" />
          <label class="form-check-label" for="flexCheckDefault">
            {{$trainingField->name}}
          </label>
        </div>

      </div>
      @endforeach
      <div class="row">
        @error('first_name_ar')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>      
      <div class="form-floating my-5">
        <input type="text" class="form-control mb-5" id="floatingInput" placeholder="else" />
        <label for="floatingInput">else</label>
      </div>
      
    </div>
    <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-50">
    <button class="toggle-section-button btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="submit">
      Submit
    </button>
    <button id="back" class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
</section>
 
  </form>
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 // jQuery code for showing the next part of registraion
 $(document).ready(function() {
  $('#next').click(function() {
    $('#shown-section').removeClass('d-block').addClass('d-none');
    $('#hidden-section').removeClass('d-none').addClass('d-block');
  });
});
$(document).ready(function() {
  $('#back').click(function() {
    $('#hidden-section').removeClass('d-block').addClass('d-none');
    $('#shown-section').removeClass('d-none').addClass('d-block');
  });
});



</script>

<script>
 
  // languages
// Get the checkboxes and levels divs
var languageCheckboxes = document.querySelectorAll('.languageName');
var levelsDivs = document.querySelectorAll('.levels');

// Add event listeners to each checkbox
languageCheckboxes.forEach((languageCheckbox, index) => {
  languageCheckbox.addEventListener('change', () => {
    // Find the corresponding levels div based on the checkbox position
    var levelsDiv = levelsDivs[index];

    // Show/hide the corresponding levels div based on the checkbox state
    if (languageCheckbox.checked) {
      levelsDiv.classList.remove('d-none');
    } else {
      levelsDiv.classList.add('d-none');
    }
  });
});
</script>
<script>

  // when the checkbox clicked slider will appear ,and when it not clicked it's will disappear
  // Get all the checkboxes
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');

  // Add event listeners to each checkbox
  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', () => {
      // Find the corresponding range input based on the checkbox position
      const rangeInput = checkbox.parentElement.nextElementSibling.querySelector('.skillLevel');

      // Show/hide the corresponding range input based on the checkbox state
      if (checkbox.checked) {
        rangeInput.classList.remove('d-none');
      } else {
        rangeInput.classList.add('d-none');
      }
    });
  });

// Get the radio buttons and connectedCompany div
var radioButtons = document.querySelectorAll('.connection-radio');
var connectedCompanyDiv = document.getElementsByClassName('conectedCompany')[0];

// Add click event listeners to the radio buttons
radioButtons.forEach(radioButton => {
  radioButton.addEventListener('click', function() {
    // Check the selected value
    if (this.value === '1') {
      // Remove the d-none class to show the div
      connectedCompanyDiv.classList.remove('d-none');
    } else if (this.value === '0') {
      // Add the d-none class to hide the div
      connectedCompanyDiv.classList.add('d-none');
    }
  });
});

</script>
@endsection