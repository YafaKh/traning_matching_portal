@extends('all_users.master')

@section('content')
<section class="profileSection mt-4">
 {{--asset('images/userImg2.png')--}}
  <div class="studentHeader">
  <h1>{{$student->first_name_en}} {{$student->second_name_en}} {{$student->third_name_en}} {{$student->last_name_en}}
  <br>{{$student->first_name_ar}} {{$student->second_name_ar}} {{$student->third_name_ar}} {{$student->last_name_ar}}</h1>
      <img src="{{ asset('assets/img/' . $student['image']) }}" alt="student Image">
    </div>
    <div class="studentInfos">

      <p class="studentInfo"><i class="bi bi-laptop-fill icon"></i>{{$student->specialization->name}}</p>
      <p class="studentInfo"><i class="bi bi-geo-alt-fill icon"></i>{{$student->city->name}}</p>
      <p class="studentInfo"><i class="bi bi-envelope-fill icon"></i>{{$student->email}}</p>
      <p class="studentInfo"><i class="bi bi-telephone-fill icon"></i>{{$student->phone}}</p>
      <p class="studentInfo"><i class="bi bi-linkedin icon"></i>{{$student->linkedin}}</p>
      @yield('edit_profile_btn')

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
    @foreach($student->skills as $skill)

    <div class="skill">
      <p>{{ $skill->name }}</p>

    </div>
    @endforeach
    <br>
    <p>English_level : {{$student->english_level}}/5</p>

  </section>

  <section class="profileSection studentSkills overflow-auto">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info">

      <h3>Preferred city for training:</h3>
     @foreach($student->cities as $city)
      <p>{{ $city->name }}</p>
      @endforeach
    </div>

    <div class="info">
      <h3>preferred training field:</h3>
      <!-- there is an error here about the name  -->
     @foreach($student->preferredTrainingFields as $field)
      <p>{{ $field->name }}</p>
      @endforeach
    </div>
    <div class="info">
      <h3>when available:</h3>
    <p> {{$student->availability_date}}</p>
   
    </div>

  </section>

@endsection