@extends('company_employee.master')
@section('navbar')
@include('company_employee.trainer.navbar')
@endsection

@section('content')
<div class="px-2">
<section class="">
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's Evaluation Form</h2>
  </div>
  <div class=" col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
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
  <textarea class="w-100" style="height: 200px;"></textarea>
</div>

</section>
<div class="text-center">
    <button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">Submit</button>
</div>