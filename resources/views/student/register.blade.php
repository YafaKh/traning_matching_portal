@extends('all_users.master')
@section('content')

  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <form action="{{route('student_registeration.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
  <section class="registerSection d-block " id="shown-section">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>
  <div class="row">
    @foreach ($errors->all() as $error)
        <span class="text-danger">{{ $error }}</span><br>
    @endforeach
</div> 

    <div class="mx-5">
    <label for="first_name_ar" class="mt-3 mb-3"> Name (Arabic)</label>
<div class="row g-2">
  <div class="form-floating col-md mb-3">
    <input type="text" class="form-control" id="first_name_ar" name="first_name_ar" placeholder="First" value="{{ old('first_name_ar') }}" />
    <label for="first_name_ar">First</label>
    <div class="row">
      @error('first_name_ar')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>

  <div class="form-floating col-md  mb-3">
    <input type="text" class="form-control" id="second_name_ar" name="second_name_ar" placeholder="Second" value="{{ old('second_name_ar') }}" />
    <label for="second_name_ar">Second</label>
    <div class="row">
      @error('second_name_ar')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
</div>
<div class="row g-2">
  <div class="form-floating col-md">
    <input type="text" class="form-control" id="third_name_ar" name="third_name_ar" placeholder="Third" value="{{ old('third_name_ar') }}" />
    <label for="third_name_ar">Third</label>
    <div class="row">
      @error('third_name_ar')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-floating col-md">
    <input type="text" class="form-control" id="last_name_ar" name="last_name_ar" placeholder="Last" value="{{ old('last_name_ar') }}" />
    <label for="last_name_ar">Last</label>
    <div class="row">
      @error('last_name_ar')
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
      <input type="text" class="form-control" id="first_name_en" name="first_name_en" placeholder="First" value="{{ old('first_name_en') }}" />
      <label for="first_name_en">First</label>
      <div class="row">
        @error('first_name_en')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating col-md  mb-3">
      <input type="text" class="form-control" id="second_name_en" name="second_name_en" placeholder="Second" value="{{ old('second_name_en') }}" />
      <label for="second_name_en">Second</label>
      <div class="row">
        @error('second_name_en')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
  </div>
  <div class="row g-2">
    <div class="form-floating col-md">
      <input type="text" class="form-control" id="third_name_en" name="third_name_en" placeholder="Third" value="{{ old('third_name_en') }}" />
      <label for="third_name_en">Third</label>
      <div class="row">
        @error('third_name_en')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    <div class="form-floating col-md">
      <input type="text" class="form-control" id="last_name_en" name="last_name_en" placeholder="Last" value="{{ old('last_name_en') }}" />
      <label for="last_name_en">Last</label>
      <div class="row">
        @error('last_name_en')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
  </div>
</div>
<div class="m-5">
  <div class="form-floating mb-4">
    <input type="text" class="form-control" id="student_num" name="student_num" placeholder="StudentID" value="{{ old('student_num') }}" />
    <label for="student_num">StudentID</label>
    <div class="row">
      @error('student_num')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-floating mb-4">
    <input type="text" class="form-control" id="Studentphone" name="phone" placeholder="Phone number" value="{{ old('phone') }}" />
    <label for="Studentphone">Phone number</label>
    <div class="row">
      @error('phone')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-floating mb-4">
    <input type="text" class="form-control" id="StudentEmail" name="email" placeholder="University email" value="{{ old('email') }}" />
    <label for="StudentEmail">University email</label>
    <div class="row">
      @error('email')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
      </div>
      <div class="form-floating mb-4 mx-5">
  <select class="form-select col mb-4" name="city" id="studentAddress">
    <option value="--">Permanent residence address</option>
    @foreach($cities as $city)
    <option value="{{$city->id}}" {{ old('city') == $city->id ? 'selected' : '' }}>{{$city->name}}</option>
    @endforeach
  </select>
</div>

<div class="form-floating mx-5">
  <div class="form-floating ms-2 mb-4 d-flex flex-row gx-5">
    <div class="col"><label for="">Gender</label></div>
    <div class="form-check col">
      <input class="form-check-input" type="radio" name="gender" id="StudentGender1" value="1" {{ old('gender') == 1 ? 'checked' : '' }}/>
      <label class="form-check-label" for="StudentGender1">
        Female
      </label>
    </div>
    <div class="form-check col">
      <input class="form-check-input" type="radio" name="gender" id="StudentGender2" value="0" {{ old('gender') == 0 ? 'checked' : '' }}/>
      <label class="form-check-label" for="StudentGender2">
        Male
      </label>
    </div>
  </div>

  <div class="form-floating mb-4">
    <select class="form-select" id="specialization" name="specialization">
      <option value="" selected disabled>Specialization</option>
      @foreach($specializations as $specialization)
      <option value="{{$specialization->id}}" {{ old('specialization') == $specialization->id ? 'selected' : '' }}>{{$specialization->name}}</option>
      @endforeach
    </select>
    <div class="row">
      @error('specialization')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  
  <div class="form-floating mb-4">
    <input type="text" class="form-control" id="gpa" name="gpa" placeholder="GPA" value="{{ old('gpa') }}" />
    <label for="gpa">GPA</label>
    <div class="row">
      @error('gpa')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  
  <div class="form-floating mb-4">
    <input type="number" class="form-control" id="passed_hours" name="passed_hours" placeholder="Number of passed hour" value="{{ old('passed_hours') }}" />
    <label for="passed_hours">Number of passed hour</label>
    <div class="row">
      @error('passed_hours')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  
  <div class="d-flex flex-sm-row flex-column">
    <input type="password" class="form-control me-3 mb-4 ps-4" id="password" placeholder="Password" name="password">
    <input type="password" class="form-control mb-4 ps-4" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
    <div class="row">
      @error('password')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  
  <div class="form-group row mb-4 px-2">
    Profile Image:
    <input class="form-control ps-4 opacity-75" type="file" name="image" id="formFile">
    @error('image') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
  </div>
</div>
</div>
<div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-50">
    <button id="next" class="btn btn-primary bg-dark-blue text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Next
    </button>
  </div>
</section>
<section class="registerSection d-none " id="hidden-section">
<div class="registerField">
  <label for="" class="my-3 ms-3">Skills</label>
  @foreach($skills as $skill)
  <div class="row g-2 ms-3 mb-2">
    <div class="form-check col">
      <input class="form-check-input" type="checkbox" value="{{$skill->id}}" name="skills[]" id="skillcheckbox{{$loop->index}}" {{ is_array(old('skills')) && in_array($skill->name, old('skills')) ? 'checked' : '' }} />
      <label class="form-check-label" for="skillcheckbox{{$loop->index}}">
        {{$skill->name}}
      </label>
    </div>
  </div>
  @endforeach
  <div class="my-3">
    <label for="other_skills">Add any other skills. Please provide them separated by commas</label>
    <input type="text" class="form-control" id="other_skills" name="other_skills" placeholder="Other Skills" value="{{ old('other_skills') }}" />
    <div class="row">
      @error('other_skills')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
</div>
<div class="my-3 ms-5 ps-4">
  <label for="english_level">English Level</label>
  <input type="range" min="1" max="5" name="english_level" value="{{ old('english_level') }}">
  <div class="row">
    @error('english_level')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="registerField">
  <div class="form-floating mb-4">
    <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Linkedin" value="{{ old('linkedin') }}" />
    <label for="linkedin">Linkedin</label>
  </div>
  <div class="row">
    @error('linkedin')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="form-floating mb-4">
    <input type="number" class="form-control" id="load" name="load" placeholder="Number of semester hours" value="{{ old('load') }}" />
    <label for="load">Number of semester hours (without internship)</label>
  </div>
  <div class="row">
    @error('load')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="mb-4">
    <textarea name="work_experience" id="work_experience" cols="55" rows="7" placeholder="Experience (optional)" class="overflow-auto">{{ old('work_experience') }}</textarea>
  </div>
  <div class="row">
    @error('work_experience')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="form-floating mb-4 gx-5">
    <div class="me-4">
      <label for="">Are you in contact with a specific company?</label>
    </div>
    <div class="d-flex flex-row">
      <div class="form-check my-3">
        <label class="form-check-label" for="connected_with_a_company">
          <input class="form-check-input connection-radio" type="radio" value="1" name="connected_with_a_company" id="connected_with_a_company" {{ old('connected_with_a_company') == 1 ? 'checked' : '' }} />
          Yes
        </label>
      </div>
      <div class="form-check ms-5 my-3">
        <label class="form-check-label" for="connected_with_a_company">
          <input class="form-check-input connection-radio" type="radio" value="0" name="connected_with_a_company" id="connected_with_a_company" {{ old('connected_with_a_company') != 1 ? 'checked' : '' }} />
          No
        </label>
      </div>
    </div>
  </div>
  <div class="form-floating mb-4 conectedCompany {{ old('connected_with_a_company') != 1 ? 'd-none' : '' }}">
    <select class="form-select mb-2" id="companiesName" name="company" wire:model="selectedCompany">
      <option value="">Company name</option>
      @foreach($companies as $company)
      <option value="{{$company->id}}" {{ old('company') == $company->id ? 'selected' : '' }}>{{$company->name}}</option>
      @endforeach
    </select>
    <div class="row">
      @error('company')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <select class="form-select mb-3 disabled" id="Branch" name="Branch">
      <option selected>Company branch</option>
      @foreach($branches as $branch)
      <option value="{{$branch->id}}" {{ old('Branch') == $branch->id ? 'selected' : '' }}>{{$branch->address}}</option>
      @endforeach
    </select>
  </div>
  <div class="row">
    @error('Branch')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="dropdown mb-4">
    <button class="form-select border py-3 text-start" type="button">Preferred company/ies :</button>
    <div class="dropdown-content col mx-2" id="preferrdCompny">
      <label class="checkbox-label">
        @foreach($companies as $company)
        <div class="d-flex flex-row">
          <input type="checkbox" value="{{$company->id}}" name="preferrdCompany[]" class="form-check-input" {{ is_array(old('preferrdCompany')) && in_array($company->id, old('preferrdCompany')) ? 'checked' : '' }} />
          <p>{{$company->name}}</p>
        </div>
        @endforeach
      </label>
    </div>
    <div class="row">
      @error('preferrdCompny')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="dropdown">
    <button class="form-select border py-3 text-start" type="button">Preferred city/ies :</button>
    <div class="dropdown-content col mx-2" id="preferrdCity" name="preferrdCities[]">
      <label class="checkbox-label">
        @foreach($cities as $city)
        <div class="d-flex flex-row">
          <input type="checkbox" name="option1" value="{{$city->id}}" class="form-check-input" {{ is_array(old('preferrdCities')) && in_array($city->id, old('preferrdCities')) ? 'checked' : '' }} />
          <p>{{$city->name}}</p>
        </div>
        @endforeach
      </label>
    </div>
    <div class="row">
      @error('cities[]')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="dropdown mb-4">
    <button class="form-select border py-3 text-start" type="button">Preferred training field :</button>
    <div class="dropdown-content col mx-2" id="trainingFields" name="trainingFields[]">
      <label class="checkbox-label">
        @foreach($trainingFields as $trainingField)
        <div class="d-flex flex-row">
          <input type="checkbox" name="option1" value="{{$trainingField->id}}" class="form-check-input" {{ is_array(old('trainingFields')) && in_array($trainingField->id, old('trainingFields')) ? 'checked' : '' }} />
          <p>{{$trainingField->name}}</p>
        </div>
        @endforeach
      </label>
    </div>
    <div class="row">
      @error('trainingFields')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="mt-3">
    <label for="other_fields">Add any other fields. Please provide them separated by commas</label>
    <input type="text" class="form-control" id="other_fields" name="other_fields" placeholder="Other Fields" value="{{ old('other_fields') }}" />
    <div class="row">
      @error('other_fields')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="my-3">
    <label>when available:</label>
    <div class="input-group form-floating" id="availability_date">
      <input type="date" class="form-control" name="availability_date" value="{{ old('availability_date') }}" />
    </div>
  </div>
  <div class="row">
    @error('availability_date')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>
   
    <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-50">
    <button id="back" class="btn btn-secondary text-light px-5 my-3 flex-grow-1 col-md" type="button">
      Back
    </button>
    <button class="toggle-section-button btn btn-primary bg-dark-blue text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="submit">
      Submit
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
// dropdownlist contains checkobxes
var checkList = document.getElementById('list1');
checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
  if (checkList.classList.contains('visible'))
    checkList.classList.remove('visible');
  else
    checkList.classList.add('visible');
}
</script>
@endsection