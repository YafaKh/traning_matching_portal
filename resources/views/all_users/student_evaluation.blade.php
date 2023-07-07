@extends('all_users.master')

@section('content')
<div class="px-2">
  <section>
    <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
      <h2 class="text-light">Trainee's Evaluation Form</h2>
    </div>
    <div class="col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
      <div class="d-flex flex-row">
        <div class="me-5">
          <p>Trainee's Name</p>
          <p>{{$student->first_name_en}} {{$student->last_name_en}}</p>
          <hr>
        </div>
        <div class="ms-5">
          <p>Training</p>{{$student->training->name ??''}}<hr>
        </div>
      </div>
    </div>
  </section>

  <section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
    <div>
      <p>In what areas would you like to see the student improve or expand his experience before applying for permanent work?</p>
      <textarea class="w-100" style="height: 100px;" name="student_weaknesses" disabled>{{$evaluation_data->student_weaknesses ?? ''}}</textarea>
    </div>
  </section>

  <section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
    <div>
      <p>Would you be willing to hire this student in your company, why?</p>
      <div class="d-flex flex-row mb-3">
        <div class="form-check me-5">
          <input class="form-check-input" type="radio" value="1" name="willing_to_hire" disabled @if(($evaluation_data ?? null) && $evaluation_data->willing_to_hire) checked @endif>
          <label class="form-check-label" for="yes">
            Yes
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="willing_to_hire" value="0" disabled @if((($evaluation_data ?? null) && !$evaluation_data->willing_to_hire) || (!$evaluation_data)) checked @endif>
          <label class="form-check-label" for="no">
            No
          </label>
        </div>
      </div>
      <textarea class="w-100" style="height: 100px;" name="willing_to_hire_reason" disabled>{{$evaluation_data->willing_to_hire_reason ?? ''}}</textarea>
    </div>
  </section>

  <section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
    <div>
      <p>Additional comments: </p>
      <textarea class="w-100" style="height: 100px;" name="comments" disabled>{{$evaluation_data->comments ?? ''}}</textarea>
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
              <td class="d-flex flex-row justify-content-between" style="width: 500px;">
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
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark1" style="width: 400px;" name="attendance" disabled value="{{$evaluation_data->attendance ?? ''}}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox1" name="attendance" disabled @if(($evaluation_data ?? null) && $evaluation_data->attendance == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Fulfilling required tasks</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark2" style="width: 400px;" name="fulfilling_required_tasks" disabled value="{{ $evaluation_data->fulfilling_required_tasks ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox2" name="fulfilling_required_tasks" disabled @if(($evaluation_data ?? null) && $evaluation_data->fulfilling_required_tasks == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Cooperation with colleagues and Teamwork ability</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark3" style="width: 400px;" name="teamwork_ability" disabled value="{{ $evaluation_data->teamwork_ability ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox3" name="teamwork_ability" disabled @if(($evaluation_data ?? null) && $evaluation_data->teamwork_ability == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Punctuality</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark4" style="width: 400px;" name="punctuality" disabled value="{{ $evaluation_data->punctuality ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" id="checkbox4" name="punctuality" disabled @if(($evaluation_data ?? null) && $evaluation_data->punctuality == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Quality of work</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark5" style="width: 400px;" name="quality_of_work" disabled value="{{ $evaluation_data->quality_of_work ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" id="checkbox5" name="quality_of_work" disabled @if(($evaluation_data ?? null) && $evaluation_data->quality_of_work == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Dependability</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark6" style="width: 400px;" name="dependability" disabled value="{{ $evaluation_data->dependability ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox6" name="dependability" disabled @if(($evaluation_data ?? null) && $evaluation_data->dependability == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Initiative</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark7" style="width: 400px;" name="initiative" disabled value="{{ $evaluation_data->initiative ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox7" name="initiative" disabled @if(($evaluation_data ?? null) && $evaluation_data->initiative == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>General appearance</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark8" style="width: 400px;" name="general_appearance" disabled value="{{ $evaluation_data->general_appearance ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox8" name="general_appearance" disabled @if(($evaluation_data ?? null) && $evaluation_data->general_appearance == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Ability to judge</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark9" style="width: 400px;" name="ability_to_judge" disabled value="{{ $evaluation_data->ability_to_judge ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox9" name="ability_to_judge" disabled @if(($evaluation_data ?? null) && $evaluation_data->ability_to_judge == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Enthusiasm</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark10" style="width: 400px;" name="enthusiasm" disabled value="{{ $evaluation_data->enthusiasm ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox10" name="enthusiasm" disabled @if(($evaluation_data ?? null) && $evaluation_data->enthusiasm == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>Communicational Skills</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark11" style="width: 400px;" name="communicational_skills" disabled value="{{ $evaluation_data->communicational_skills ?? '' }}">
              </td>
              <td class="d-flex justify-content-center">
                <input class="form-check-input shadow" type="checkbox" value="" id="checkbox11" name="communicational_skills" disabled @if(($evaluation_data ?? null) && $evaluation_data->communicational_skills == -1) checked @endif>
              </td>
            </tr>
            <tr>
              <td>English Language proficiency</td>
              <td>
                <input type="range" class="form-range" min="0" max="5" id="mark12" style="width: 400px;" name="english_language_proficiency" disabled value="{{ $evaluation_data->english_language_proficiency ?? '' }}">
              </td>
            <td class="d-flex justify-content-center">
              <input class="form-check-input shadow" type="checkbox" value="" id="checkbox12" name="english_language_proficiency" disabled @if(($evaluation_data ?? null) && $evaluation_data->english_language_proficiency==-1) checked @endif>
            </td>
          </tr>
          <tr>
          <td class="fw-bold">Average:</td>
          <td><input type="text" id="avg" class="w-25 form-control text-center bg-white" disabled value="{{$evaluation_data->avg ?? ''}}">
          </td>
          <td></td>
          </tr>
      </tbody>
    
      </table>
   </div>
  </div>
</section>
@endsection