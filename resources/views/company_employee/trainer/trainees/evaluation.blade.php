@extends('company_employee.master')
@section('navbar')
@include('company_employee.trainer.navbar')
@endsection

@section('content')
<div class="px-2">
<section>
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's Evaluation Form</h2>
  </div>
  <div class="col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
    <div class="d-flex flex-row ">
      <div class="me-5">
          <p>Trainee's Name</p>
          <p>*****</p><hr>
      </div>
      <div class="ms-5">
          <p>Training</p>
          <p>***</p><hr>
      </div>
   </div>
   </div>
</section>

<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>In what areas would you like to see the student improve or expand his experience before applying for permanent work?</p>
    <textarea class="w-100" style="height: 100px;"></textarea>
  </div>
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Would you be willing to hire this student in your company, why?</p>
    <div class="d-flex flex-row mb-3">
      <div class="form-check me-5">
        <input class="form-check-input " type="radio" name="choose" id="yes" checked>
        <label class="form-check-label" for="yes">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="choose" id="no">
        <label class="form-check-label" for="no">
          No
        </label>
      </div>
    </div>
    <textarea class="w-100" style="height: 100px;"></textarea>
  </div>
</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
  <div>
    <p>Additional comments: </p>
    <textarea class="w-100" style="height: 100px;"></textarea>
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
            <p style="width: 20%;">(poor)<br>1</p>
            <p style="width: 20%;"><br>2</p>
            <p style="width: 20%;"><br>3</p>
            <p style="width: 20%;"><br>4</p>
            <p style="width: 20%;">(excellent)<br>5</p>
          </td>
          <td class="mb-3"><p>Can't judge</p></td>
        </tr>
      </thead>
      <tbody class="bg-sand">
          <tr>
          <td>Fulfilling required tasks</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark1" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input  class="form-check-input shadow" type="checkbox" value="" id="checkbox1"></td>
          </tr>
          <tr>
          <td>Cooperation with colleagues and Teamwork ability</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark2" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox2"></td>
          </tr>
          <tr>
          <td>Punctuality</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark3" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox3"></td>
          </tr>
          <tr>
          <td>Quality of work</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark4" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox4"></td>
          </tr>
          <tr>
          <td>Dependability</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark5" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox5"></td>
          </tr>
          <tr>
          <td>Initiative</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark6" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox6"></td>
          </tr>
          <tr>
          <td>General appearance</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark7" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox7"></td>
          </tr>
          <tr>
          <td>Ability to judge</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark8" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox8"></td>
          </tr>
          <tr>
          <td>Enthusiasm</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark9" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox9"></td>
          </tr>
          <tr>
          <td>Communicational Skills</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark10" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox10"></td>
          </tr>
          <tr>
          <td>English Language proficiency</td>
          <td><input type="range" class="form-range" min="1" max="5" id="mark11" style="width: 400px;"></td>
          <td class="d-flex justify-content-center"><input class="form-check-input shadow" type="checkbox" value="" id="checkbox11"></td>
          </tr>
          <tr>
          <td class="fw-bold">Sum</td>
          <td>*********</td>
          <td></td>
          </tr>
      </tbody>
      </table>
   </div>
  </div>
</section>
<div class="text-center">
    <button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">Submit</button>
</div>
{{-- Disable the corresponding range slider if the checkbox is checked --}}
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