@extends('student.layout.master')
@section('content')

  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <form action="{{route('student_store',[student_id => $student->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
  <section class="registerSection">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>
    <div class="m-5">
      <label for="" class="mt-3 mb-3"> Name (Arabic)</label>
      <div class="row g-2">
        <div class="form-floating col-md ">
          <input type="text" class="form-control" id="first_name_ar" name="first_name_ar" placeholder="First" />
          <label for="floatingInput">First</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
         
        </div> -->
        </div>
        
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="second_name_ar" name="second_name_ar" placeholder="Second" />
          <label for="second_name_ar">Second</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
          
        </div> -->
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_name_ar" name="third_name_ar" placeholder="Third" />
          <label for="third_name_ar">Third</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
          
        </div> -->
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_name_ar" name="last_name_ar" placeholder="Last" />
          <label for="last_name_ar">Last</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
         
        </div> -->
        </div>
      </div>
    </div>
    <div class="mx-5">
      <label for="" class=" mb-3"> Name (English)</label>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="first_name_en" name="first_name_en" placeholder="First" />
          <label for="first_name_en">First</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
        </div> -->
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="second_name_en" name="second_name_en" placeholder="Second" />
          <label for="second_name_en">Second</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
         
        </div> -->
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_name_en" name="third_name_en" placeholder="Third" />
          <label for="third_name_en">Third</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
         
        </div> -->
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_name_en" name="last_name_en" placeholder="Last" />
          <label for="last_name_en">Last</label>
          <!-- <div class="text-danger mt-3 mb-3">
          error message
         
        </div> -->
        </div>
      </div>
    </div>
      <div class="m-5">
      <div class="form-floating ">
        <input type="text" class="form-control" id="studentID" name="studentID" placeholder="StudentID" />
        <label for="floatingInput">StudentID</label>
        <div class="text-danger mt-3 mb-3">
          error message
         
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="Studentphone" name="Studentphone" placeholder="Phone number" />
        <label for="floatingInput">Phone number</label>
        <div class="text-danger mt-3 mb-3">
          error message 
         
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="StudentEmail" name="StudentEmail" placeholder="University email" />
        <label for="floatingInput">University email</label>
        <div class="text-danger mt-3 mb-3">
          error message
         
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="StudentAddress" name="StudentAddress" placeholder="Permanent residence address " />
        <label for="floatingInput">Permanent residence address </label>
        <div class="text-danger mt-3 mb-3">
          error message
         
        </div>
      </div>

       <div class="form-floating">

      <div class="form-check">
      <div class="row g-2 ms-3 mb-2">
    @foreach($allLanguages as $allLanguage)
        <div class="form-check">
            <input class="form-check-input mt-2 languageName" type="checkbox" value="{{$allLanguage->id}}" name="languageIDs[]" id="languageName{{$allLanguage->id}}" onchange="toggleLanguageRanges({{$allLanguage->id}})" />
            <label class="form-check-label fs-5" for="languageName{{$allLanguage->id}}">
                {{$allLanguage->name}}
            </label>
        </div>
        <!-- <div class="languageRanges" id="languageRanges{{$allLanguage->id}}">
            <div class="d-flex justify-content-center">
                <label class="form-check-label ms-5 col" for="listningRange{{$allLanguage->id}}">Listening</label>
                <input type="range" min="1" max="100" value="30" name="languageRang[{{$allLanguage->id}}][listening_level]" id="listningRange{{$allLanguage->id}}" class="w-75 col me-5" />
            </div>
            <div class="d-flex justify-content-center">
                <label class="form-check-label ms-5 col" for="writingRange{{$allLanguage->id}}">Writing</label>
                <input type="range" min="1" max="100" value="30" name="languageRang[{{$allLanguage->id}}][writing_level]" id="writingRange{{$allLanguage->id}}" class="w-75 col me-5" />
            </div>
            <div class="d-flex justify-content-center">
                <label class="form-check-label ms-5 col" for="speakingRange{{$allLanguage->id}}">Speaking</label>
                <input type="range" min="1" max="100" value="30" name="languageRang[{{$allLanguage->id}}][speaking_level]" id="speakingRange{{$allLanguage->id}}" class="w-75 col me-5 d-block" />
            </div>
        </div> -->
    @endforeach
</div>

      <div class="text-danger mt-3 mb-3">
          error message
          
        </div>
      </div>
      </div>
    <div class="form-floating ms-4 mb-4 d-flex flex-row gx-5">
      <div class="col"><label for="">Gender</label></div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="StudentGender" id="StudentGender1" checked/>
        <label class="form-check-label" for="flexRadioDefault1">
          Female
        </label>
      </div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="StudentGender" id="StudentGender2" />
        <label class="form-check-label" for="flexRadioDefault2">
          Male
        </label>
      </div>
      
    </div>
    <div class="text-danger mt-3 mb-3">
          error message
          
        </div>

    <div class="form-floating mb-4">
      <select class="form-select" id="specialization" name="specialization">
        <!--here the user can choose multi value-->
        <option value="no" selected>Specialization</option>
        <option value="MMT">MMT</option>
        <option value="CS">CS</option>
      </select>
      <div class="text-danger mt-3 mb-3">
          error message
         
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="gpa" name="gpa" placeholder="GPA" />
      <label for="floatingInput">GPA</label>
      <div class="text-danger mt-3 mb-3">
          error message
         
       </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="passed_hours" name="passed_hours" placeholder="Number of passed hour" />
      <label for="floatingInput">Number of passed hour</label>
      <div class="text-danger mt-3 mb-3">
          error message
        
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
      <label for="floatingInput">Password</label>
      <div class="text-danger mt-3 mb-3">
          error message
         
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="cofirmPassword" name="cofirmPassword" placeholder="Confirm password" />
      <label for="floatingInput">Confirm password</label>
      <div class="text-danger mt-3 mb-3">
          error message
        
        </div>
    </div>
    
      <div class="uploadImage">
        <input type="file" class="form-control SetImage " name="image" id="studentImage" />

          <input type="text" class="form-control" id="floatingInput" placeholder="         Personal image" />
          <i class="fa-solid fa-link imgicon"></i>
          <div class="text-danger mb-3">
          error message
        </div>
      </div>
</div>
</div>
</section>
  <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="submit">
      Submit
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
  </form>
  
<!-- <script>
    function toggleLanguageRanges(languageId) {
        var checkbox = document.getElementById('languageName' + languageId);
        var languageRanges = document.getElementById('languageRanges' + languageId);

        if (checkbox.checked) {
            languageRanges.classList.remove('d-none');
        } else {
            languageRanges.classList.add('d-none');
        }
    }
</script> -->
  <!-- <script type="text/javascript">
    function valueChanged()
    {
        if($('.languageName').is(":checked"))   
        $(".languageRanges").show();
else
        $(".languageRanges").hide();
    }
</script> -->

<script>
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var sliders = document.querySelectorAll('input[type="range"]');

  checkboxes.forEach(function(checkbox, index) {
    checkbox.addEventListener('change', function() {
      sliders[index].disabled = checkbox.checked;
    });
  });
</script>
@endsection