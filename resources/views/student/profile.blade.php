@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')
<section class="profileSection">
 {{--asset('images/userImg2.png')--}}
  <div class="studentHeader">
      <h1>{{$student->first_name_en}} {{$student->last_name_en}}</h1>
      <img src="{{$student->image}}" alt="student Image">
    </div>
    <div class="studentInfos">
      <p class="studentInfo"><i class="bi bi-laptop-fill icon"></i>{{$specializationName}}</p>
      <p class="studentInfo"><i class="bi bi-geo-alt-fill icon"></i>{{$student->address}}</p>
      <p class="studentInfo"><i class="bi bi-envelope-fill icon"></i>{{$student->email}}</p>
      <p class="studentInfo"><i class="bi bi-telephone-fill icon"></i>{{$student->phone}}</p>
      <!-- <p class="studentInfo"><i class="bi bi-linkedin icon"></i>{{$student->address}}Linkedin</p>we need to add this to database -->
      <a class="btn editBtn" href="{{route('edit_student_profile')}}" role="button">Edit Profile</a>
    </div>
  </section>
  <section class="profileSection">
    <!-- we need to add this to datebase -->
    <div class="workExperience">
      <h1>Work experience</h1>
     
      <div class="mt-4">
          
        <div class="anWorkExperience">
            <div class="goldenDiv"></div>
          <div class="anWorkExperienceInfo">
            
            <p>{{$student->work_experience}}</p>
            <!-- <h2 class="expName">Freelance UX/UI designer</h2>
            <p>Lorem ipsum</p>
            <p>Jun 2022 — Present</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus eros eu
              vehicula interdum. Cras nec ultricies massa. Curabitur rutrum, diam id consequat consequat </p> -->
          </div>  
         
         
        </div>

        <div class="anWorkExperience">

          <div class="blueDiv"></div>
          <div class="anWorkExperienceInfo">
          <p>{{$student->work_experience}}</p>
            <!-- <h2 class="expName">Freelance UX/UI designer</h2> -->
            <!-- <p>Lorem ipsum</p>workPlace -->
            <!-- <p>Jun 2022 — Present</p>date -->
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus eros eu -->
              <!-- vehicula interdum. Cras nec ultricies massa. Curabitur rutrum, diam id consequat consequat </p> -->
            <!--expDescription-->
          </div>
         
        </div>
        
      </div>
    </div>
  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">General information</h2>
    @if ($student->gender == 1)
    <p>Gender: Female</p>
    @else
    <p>Gender: Male</p>
    @endif
    <p>GPA : {{$student->gpa}}</p>
    <p>number of passed hours : {{$student->passed_hours}}</p>
    


  </section>
  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Skills</h2>
    @foreach($allSkills as $allSkill)

    <div class="skill">
      <p>{{ $allSkill->skill->name }}</p>
      <input type="range" min="1" max="100" value="{{ $allSkill->level }}" class="w-25" disabled>
    </div>
    @endforeach



  </section>
  <section class="profileSection studentSkills overflow-auto">

    <h2 class="GeneralInfoHeader">Spoken language</h2>
    @foreach($allLanguages as $allLanguage)
    <p class="fs-4 text-dark-blue">{{ $allLanguage->spokenLanguage->name }}</p>
    <div class="skill">
      <p>speaking_level :</p>
    <input type="range" min="1" max="100" value="{{ $allLanguage->speaking_level }}" class="w-25">
    </div>
    <div class="skill">
    <p>writing_level :</p>
    <input type="range" min="1" max="100" value="{{ $allLanguage->writing_level }}" class="w-25">
     </div>
     <div class="skill">
     <p>listening_level :</p>
     <input type="range" min="1" max="100" value="{{ $allLanguage->listening_level }}" class="w-25">
     </div>
    @endforeach
  </section>
  <!-- if there is no athor skills or languages the button will disabled  -->

  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info">

      <h3>Preferred city for training:</h3>
     @foreach($allPreferredCities as $allPreferredCitie)
      <p>{{ $allPreferredCitie->city->name }}</p>
      @endforeach
    </div>

    <div class="info">
      <h3>preferred training field:</h3>
      <!-- there is an error here about the name  -->
     @foreach($allPreferredTrainingFields as $allPreferredTrainingField)
      <p>{{ $allPreferredTrainingField->preferredTrainingField->name }}</p>
      @endforeach
    </div>
    <div class="info">
      <h3>when available:</h3>
    <p> {{$student->availability_date}}</p>
   
    </div>

  </section>

@endsection