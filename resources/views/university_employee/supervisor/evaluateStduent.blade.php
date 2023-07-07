@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('students_activity')
    active
@endsection
@section('content')
<!-- header -->
<section>
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's Evaluation Form</h2>
  </div>
  <div class="col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
    <div class="d-flex flex-row ">
      <div class="me-5">
          <p>Trainee's Name</p>
          <p>{{$student->first_name_en }} {{$student->last_name_en }}</p><hr>
      </div>
      <div class="ms-5">
          <p>Training</p>
          @if($training->semester == "1")
            <p>Fall - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '2')
         <p>Spring - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '3')
         <p>First Summer - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '4')
         <p>Second Summer - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
        @endif
          
      </div>
   </div>
   </div>
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>In what areas would you like to see the student improve or expand his experience before applying for permanent work?</p>
    <textarea class="w-100" style="height: 100px;"name="student_weaknesses" disabled>{{$evaluateStudent->student_weaknesses}}</textarea>
  </div>
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Would you be willing to hire this student in your company, why?</p>
    <div class="d-flex flex-row mb-3">
    @if($evaluateStudent->willing_to_hire == 1)
      <div class="form-check me-5">
        <input class="form-check-input " type="radio" name="willing_to_hire" checked disabled>
        <label class="form-check-label" for="yes">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="willing_to_hire" disabled>
        <label class="form-check-label" for="no">
          No
        </label>

      </div>
      @elseif($evaluateStudent->willing_to_hire == 0)
      <div class="form-check me-5">
        <input class="form-check-input " type="radio" disabled>
        <label class="form-check-label" for="yes">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" checked disabled>
        <label class="form-check-label" for="no">
          No
        </label>
@endif
      </div>
    </div>
    <textarea class="w-100" style="height: 100px;" disabled>{{$evaluateStudent->willing_to_hire_reason}}</textarea>
  </div>

</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Additional comments: </p>
    <textarea class="w-100" style="height: 100px;" disabled>{{$evaluateStudent->willing_to_hire_reason}}</textarea>
  </div>

</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Please evaluate the student in terms of the following elements: </p>
    <div class="table-responsive">
      <table class="table border">
      <thead class="bg-light">
        <tr>
          <td></td>
          <td class="d-flex flex-row justify-content-betwee" style="width: 500px;">
            <p style="width: 16.67%;">(poor)<br>0</p>
            <p style="width: 16.67%;"><br>1</p>
            <p style="width: 16.67%;"><br>2</p>
            <p style="width: 16.67%;"><br>3</p>
            <p style="width: 16.67%;"><br>4</p>
            <p style="width: 16.67%;">(excellent)<br>5</p>
          </td>
          <td class="mb-3"><p>Can't judge</p></td>
        </tr>
      </thead>
      <tbody class="bg-sand">
      <tr>
          <td>Attendance</td>
          @if($evaluateStudent->attendance == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->attendance > 0 && $evaluateStudent->attendance < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->attendance}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif
          </tr>
          <tr>
          <td>Fulfilling required tasks</td>
           @if($evaluateStudent->fulfilling_required_tasks == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->fulfilling_required_tasks > 0 && $evaluateStudent->fulfilling_required_tasks < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->fulfilling_required_tasks}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif
        </tr>
          <tr>
          <td>Cooperation with colleagues and Teamwork ability</td>
          @if($evaluateStudent->teamwork_ability == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->teamwork_ability > 0 && $evaluateStudent->teamwork_ability < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->teamwork_ability}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif
          </tr>
          <tr>
          <td>Punctuality</td>
          @if($evaluateStudent->punctuality == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->punctuality > 0 && $evaluateStudent->punctuality < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->punctuality}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td>Quality of work</td>
          @if($evaluateStudent->quality_of_work == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->quality_of_work > 0 && $evaluateStudent->quality_of_work < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->quality_of_work}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td>Dependability</td>

          @if($evaluateStudent->dependability == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->dependability > 0 && $evaluateStudent->dependability < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->dependability}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif
          </tr>
          <tr>
          <td>Initiative</td>

          @if($evaluateStudent->initiative == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->initiative > 0 && $evaluateStudent->initiative < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->initiative}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif
          </tr>
          <tr>
          <td>General appearance</td>
          @if($evaluateStudent->general_appearance == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->general_appearance > 0 && $evaluateStudent->general_appearance < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->general_appearance}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td>Ability to judge</td>

          @if($evaluateStudent->ability_to_judge == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->ability_to_judge > 0 && $evaluateStudent->ability_to_judge < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->ability_to_judge}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td>Enthusiasm</td>
          @if($evaluateStudent->enthusiasm == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;"  value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->enthusiasm > 0 && $evaluateStudent->enthusiasm < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->enthusiasm}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

        </tr>
          <tr>
          <td>Communicational Skills</td>
           @if($evaluateStudent->communicational_skills == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->communicational_skills > 0 && $evaluateStudent->communicational_skills < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->communicational_skills}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td>English Language proficiency</td>
           @if($evaluateStudent->english_language_proficiency == 0)
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;"  value="0" disabled></td>
          <td class="d-flex justify-content-center">
           <input class="form-check-input shadow" type="checkbox" id="checkbox1" checked disabled></td>
            @elseif($evaluateStudent->english_language_proficiency > 0 && $evaluateStudent->english_language_proficiency < 6)
            <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" value="{{$evaluateStudent->english_language_proficiency}}" disabled></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" id="checkbox1" disabled></td>
            @endif

          </tr>
          <tr>
          <td class="fw-bold">Average</td>
          <td><input type="text" id="avg" name="avg" value="{{$evaluateStudent->avg}}%" class="w-25 form-control text-center bg-white" disabled>
          </td>
          <td></td>
          </tr>
      </tbody>
    
      </table>
   </div>
  </div>
</section>
<section>
<div class="text-center">
<a class="btn btn-secondary px-5 my-3 mx-auto w-25" type="button" href="{{route('supervisor_list_students',['user_id' => $user->id])}}">Back</a>
  </div>
</section>
@endsection