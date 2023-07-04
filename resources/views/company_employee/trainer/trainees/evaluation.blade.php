@extends('company_employee.master')
@section('navbar')
@include('company_employee.trainer.navbar')
@endsection

@section('content')
<div class="px-2">
<form action="{{route('fill_traniee_evaluation.add', ['user_id' => $trainer->id,'trainee_id' => $trainee->id])}}" method="POST" enctype="multipart/form-data">
@csrf
<section>
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's Evaluation Form</h2>
  </div>
  <div class="col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
    <div class="d-flex flex-row ">
      <div class="me-5">
          <p>Trainee's Name</p>
          <p>{{$trainee->first_name_en}} {{$trainee->last_name_en}}</p><hr>
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
    <textarea class="w-100" style="height: 100px;" name="student_weaknesses"></textarea>
  </div>
  @error('student_weaknesses')
            <span class="text-danger">{{ $message }}</span>
  @enderror
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Would you be willing to hire this student in your company, why?</p>
    <div class="d-flex flex-row mb-3">
      <div class="form-check me-5">
        <input class="form-check-input " type="radio" id="yes" name="willing_to_hire" checked>
        <label class="form-check-label" for="yes">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="willing_to_hire" id="no">
        <label class="form-check-label" for="no">
          No
        </label>
      </div>
    </div>
    <textarea class="w-100" style="height: 100px;" name="willing_to_hire_reason"></textarea>
  </div>
  @error('willing_to_hire_reason')
            <span class="text-danger">{{ $message }}</span>
  @enderror
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Additional comments: </p>
    <textarea class="w-100" style="height: 100px;" name="comments"></textarea>
  </div>
  @error('comments')
            <span class="text-danger">{{ $message }}</span>
  @enderror
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
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" name="attendance"></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" value="" id="checkbox1" name="attendance"></td>
          </tr>
          <tr>
          <td>Fulfilling required tasks</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" name="fulfilling_required_tasks"></td>
          <td class="d-flex justify-content-center">
            <input  class="form-check-input shadow" type="checkbox" value="" id="checkbox1" name="fulfilling_required_tasks"></td>
          </tr>
          <tr>
          <td>Cooperation with colleagues and Teamwork ability</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark2" style="width: 400px;" name="teamwork_ability"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox2" name="teamwork_ability"></td>
          </tr>
          <tr>
          <td>Punctuality</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark3" style="width: 400px;" name="punctuality"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" id="checkbox3" name="punctuality"></td>
          </tr>
          <tr>
          <td>Quality of work</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark4" style="width: 400px;" name="quality_of_work"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" id="checkbox4" name="quality_of_work"></td>
          </tr>
          <tr>
          <td>Dependability</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark5" style="width: 400px;" name="dependability"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox5" name="dependability"></td>
          </tr>
          <tr>
          <td>Initiative</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark6" style="width: 400px;" name="initiative"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox6" name="initiative"></td>
          </tr>
          <tr>
          <td>General appearance</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark7" style="width: 400px;" name="general_appearance"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox7" name="general_appearance"></td>
          </tr>
          <tr>
          <td>Ability to judge</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark8" style="width: 400px;"  name="ability_to_judge"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox8" name="ability_to_judge"></td>
          </tr>
          <tr>
          <td>Enthusiasm</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark9" style="width: 400px;" name="enthusiasm"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox9" name="enthusiasm"></td>
          </tr>
          <tr>
          <td>Communicational Skills</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark10" style="width: 400px;" name="communicational_skills"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox10" name="communicational_skills"></td>
          </tr>
          <tr>
          <td>English Language proficiency</td>
          <td><input type="range" class="form-range" min="0" max="5" id="mark11" style="width: 400px;" name="english_language_proficiency"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox11" name="english_language_proficiency"></td>
          </tr>
          <tr>
          <td class="fw-bold">
          <button class="btn btn-primary" id="sumBtn">Average</button></td>
          <td><input type="text" id="avg" name="avg" disabled class="w-25 form-control text-center bg-white">
          <input type="hidden" id="hiddenavg" name="avg" class="w-25 form-control text-center bg-white">

          @error('avg')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          </td>
          <td></td>
          </tr>
      </tbody>
    
      </table>
   </div>
  </div>
</section>
<div class="text-center">
<a class="btn btn-secondary px-5 my-3 mx-auto" type="button" href="{{route('trainer_list_traniees',['user_id' => $trainer->id])}}">Back</a>

<button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">Submit</button>

  </div>
</form>
{{-- Disable the corresponding range slider if the checkbox is checked --}}
 <script>
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var sliders = document.querySelectorAll('input[type="range"]');

  checkboxes.forEach(function(checkbox, index) {
    checkbox.addEventListener('change', function() {
      if (checkbox.checked) {
      sliders[index].disabled = true;
      // give the slider lowest possible value 
      sliders[index].value = 0;
    } else {
      sliders[index].disabled = false;
    }
    });
  }); 
</script>
<!-- calculate avg -->



@endsection