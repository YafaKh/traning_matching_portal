@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')


  <section class="profileSection">
    <div class="studentHeader">
      <div class="row">
        <h1>
      <input class="form-control form-control w-25 opacity-75 mb-2" type="text" name="first_name_en" placeholder="{{$student->first_name_en}}"
          aria-label=".form-control-lg example">

      <input class="form-control form-control w-25 opacity-75" type="text" name="last_name_en" placeholder="{{$student->last_name_en}}"
          aria-label=".form-control-lg example">

          </h1>
      </div>
      <img src="{{asset('images/userImg2.png')}}" alt="student Image">

      <div class="uploadImage">
        <input type="file" name="image" id="" class="changeImage">
        <i class="bi bi-camera-fill fs-3"></i>

      </div>
    </div>
    <div class="studentInfos">
    <div class="form-floating col-md w-50 studentInfo">
          <input type="text" class="form-control fs-6 " id="Specialization" name="Specialization" value="{{$student->specialization->name}}" />
          <label for="Specialization">Specialization</label>
    </div>
      <div class="input-group w-50 studentInfo">
        <select class="form-select  text-secondary w-50" id="inputGroupSelect01">
          <option selected>address</option>
          @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-floating col-md w-50 studentInfo">
          <input type="text" class="form-control" id="email" name="email" value="{{$student->email}}" />
          <label for="email">email</label>
    </div>

    <div class="form-floating col-md w-50 studentInfo">
          <input type="text" class="form-control" id="phone" name="phone" value="{{$student->phone}}" />
          <label for="phone">phone</label>
    </div>
    <div class="form-floating col-md w-50 mb-1 studentInfo">
          <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{$student->linkedin}}" />
          <label for="linkedin">linkedin</label>
    </div>
    </div>
    <a class="text-decoration-none changePassword" href="#">Change password</a>

  </section>
  <section class="profileSection studentSkills overflow-auto">
    <div class="workExperience pb-3">
      <h1>Work experience <i class="fa-solid fa-plus text-primary"></i></h1>
      <div class="mt-4">
        <div class="anWorkExperience">
          <div class="goldenDiv"></div>
          <div class="anWorkExperienceInfo">
          
                <textarea name="expDescription" id="expDescription" cols="50" rows="10"
                class=" overflow-auto mb-2">{{$student->work_experience}}</textarea>
                
          </div>

        </div>
      </div>

  </section>
  <section class="profileSection studentGeneralInfo">
    <h2 class="GeneralInfoHeader">General information</h2>
    <div>
    <div class="form-floating col-md ms-5 w-50 studentInfo">
          <input type="text" class="form-control" id="passed_hours" name="passed_hours" value="{{$student->passed_hours}}" />
          <label for="passed_hours">Number of passed hour</label>
    </div>
      <!-- <input type="text" class="form-control ms-5 w-25 mb-4" id="new_skill" placeholder="Number of passed hour :{{$student->passed_hours}}"> -->
      <div class="input-group ms-5 w-50 my-4">
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="{{$student->gender}}" selected>Female</option>
          <option value="{{$student->gender}}">Male</option>

        </select>
      </div>
      <div class="form-floating col-md ms-5 w-50 studentInfo">
          <input type="text" class="form-control" id="gpa" name="gpa" value="{{$student->gpa}}" />
          <label for="gpa">GPA</label>
    </div>
      <!-- <input type="text" class="form-control ms-5 my-4 w-25" id="new_skill" placeholder="GPA: {{$student->gpa}}"> -->
    </div>
  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Skills <i class="fa-solid fa-plus text-primary"></i>
    </h2>
    @foreach($skills as $skill)

    <div class="skill">
      <a class="ms-5" href="#" role="button"><i class="fa-solid fa-trash-can text-danger"></i>
      </a>
      <p class="ps-2 w-25">{{$skill->name}}</p>
      
      <input type="range" class="form-range w-25"  min="0" max="5" value="{{ $skill->level }}" id="disabledRange">

    </div>
@endforeach
    
    <div class="skill d-inline">
     
      <div class="d-flex flex-row mb-3">

        <input type="text" class="form-control ms-5 w-25" id="new_skill" name="skill_name" placeholder="New skill">
        <div class="ms-2 w-50">
          <input type="range" min="1" max="100" name="level" class="form-range w-50">
        </div>

      </div>

    </div>

    </div>

  </section>
  <section class="profileSection studentSkills overflow-auto">
    
    <h2 class="GeneralInfoHeader">Spoken language <i class="fa-solid fa-plus text-primary"></i></h2>
    @foreach($spokenLanguages as $spokenLanguage )


    <div>
      <p class="fs-4 text-dark-blue">{{$spokenLanguage->name}}</p>
      <div class="skill">
      <p>speaking_level :</p>
      <input type="range" class="form-range w-25" name="l" min="0" max="5"  id="disabledRange">
    </div>
    <div class="skill">
    <p>writing_level :</p>
    <input type="range" class="form-range w-25"  min="0" max="5" id="disabledRange">

     </div>
     <div class="skill">
     <p>listening_level :</p>
    <input type="range" class="form-range w-25"  min="0" max="5" id="disabledRange">

     </div>
    </div>
    @endforeach
  </section>

  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info">
      <h3>Preferred city for training:</h3>
      <div class="input-group w-50 studentInfo">
        <select class="form-select  text-secondary" id="multiselect" multiple="multiple">
        @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
        </select>
        <!-- <select class="form-select  text-secondary" id="multiselect" multiple="multiple">
        <option value="no" selected>--</option>  
        @foreach($cities as $city)
          <option value="{{$city->id}}">
            <input type="checkbox" name="{{$city->name}}" id="">
          </option>
        @endforeach
        </select> -->
      </div>
      <!-- <div class="row">
        <div class="selected-box">Jenin </div>
        <div class="selected-box">Nablus </div>
      </div> -->
    </div>

    <div class="info">
      <h3>preferred training field:</h3>

      <div class="input-group w-50 studentInfo">
      <select class="form-select  text-secondary" id="multiselect" multiple="multiple">
        @foreach($trainingFields as $field)
          <option value="{{$field->id}}">{{$field->name}}</option>
        @endforeach
        </select>
        <!-- <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="no" selected>--</option>
          <option value="yes">mobile application</option>
          <option value="yes">Web -front end</option>

        </select> -->
      </div>
      <!-- <div class="row">
        <div class="selected-box">Web -front end </div>


      </div> -->
    </div>
    <div class="info">
      <h3>when available:</h3>
      <div class="input-group date w-25 mb-2" id="datepicker">
        <input type="date" class="form-control " placeholder="Date">
      </div>
  </section>
  </div>

  <div class="text-center d-flex col-md-5 mx-auto">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" type="button">Save</button>
    <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">cancel</button>
  </div>
  <!-- <script>
  $(document).ready(function(){

  });
  </script> -->
@endsection