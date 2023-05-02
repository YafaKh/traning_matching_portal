@extends('university_employee.master')
@section('navbar')
@include('university_employee.supervisor.navbar')
@endsection

@section('content')
<div class="px-2">
<section class="">
<div class="position-relative col-md-9 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
  <h1 class="text-light mb-4">Visit Form</h1>
</div>
<div class=" col-md-9 bg-white mb-3 p-md-5 px-3 mx-auto rounded-bottom-2">
  <div class="d-flex flex-row ">
    <div class="me-5">
      <p>Student Name</p>
      <p>*****</p><hr>
    </div>
    <div class="ms-5">
      <p>Company</p>
      <p>***</p><hr>
    </div>
  </div>
</div>

</section>
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<div class="d-flex flex-row">
    <p>Visit Date: </p>
    <input type = "date" name = "date" class="ms-3 col-sm-5 col-8">  
</div>
<div class="d-flex flex-row mt-3">
    <p>Visit way : </p>
    <div class="col-sm-5 col-8">
      <select class="form-select ms-3 mb-2 txt-sm w-100" aria-label="visit_way">
        <option selected>Visit way</option>
        <option value="Online">Online</option>
        <option value="site">On-site</option>
      </select>
    </div>
</div>
<p>Report : </p>
<textarea class="col-10" style="height: 200px;"></textarea>

</div>
</section>
<div class="text-center">
  <button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">Submit</button>
</div>
@endsection