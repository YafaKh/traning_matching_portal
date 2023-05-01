@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('content')
<section>
<div class="position-relative col-md-9 col-11 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
  <input type="text" class="form-control mt-4 ps-4 w-auto opacity-75" id="phone" placeholder="Company Name">
  <img src="{{asset('images/userImg2.png')}}" alt="student Image" class="profile_img rounded-circle me-md-5 me-1 position-absolute end-0 top-50">
</div>
<div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-bottom-2">
  <div class="col-8 d-inline-block">
  <input type="text" class="form-control mt-4 ps-4" id="phone" placeholder="Industry">
  <input type="text" class="form-control mt-4 ps-4" id="phone" placeholder="Website">
  <input type="text" class="form-control mt-4 ps-4" id="phone" placeholder="Email">
  <input type="text" class="form-control mt-4 ps-4" id="phone" placeholder="Phone">
  <input type="text" class="form-control mt-4 ps-4" id="phone" placeholder="Linkedin">
  </div>
  <button class="btn btn-sm btn-primary bg-dark-blue text-light px-3 mt-5 me-md-4 w-auto float-end" type="button">Edit Image</button>
</div>

</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Description </p>
<input type="text" class="form-control mt-4 ps-4" id="phone">
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Branches</p>
<p class="float-start me-5">gggggggggggg</p><i class="bi bi-trash3 fs-6 text-danger float-start"></i><br>
<div class="input-group mt-4">
  <span class="input-group-text"><i class="bi bi-plus-square fs-6"></i></span>
  <input type="text" class="form-control ps-4" id="new_address" placeholder="New address">
</div>
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<h6 class="border-bottom pb-2 mb-0">Contact persons</h6>
    <div class="d-flex text-body-secondary pt-3">
      <img src="{{asset('images/userImg.png')}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" ></img>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark mb-1">EmployeeName (Role)</strong>
        <i class="bi bi-envelope-fill me-2"></i>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="bi bi-telephone-fill me-2"></i>Phone
      </p>
      <i class="bi bi-trash3 ms-4 fs-6 text-danger float-start"></i>
    </div>
    <div class="input-group mt-4">
      <span class="input-group-text"><i class="bi bi-plus-square fs-6"></i></span>
      <select id="role" class="form-select">
        <option selected>Add contact person</option>
        <option value="emp1">emp1</option>
      </select>
    </div>
</section>
<div class="text-center d-flex col-md-5 mx-auto">
  <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" type="button">Save</button>
  <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">cancel</button>
</div>

@endsection