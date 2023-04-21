@extends('university_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection

@section('content')

<section class="">
<div class="position-relative col-md-9 col-11 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
  <h1 class="text-light mb-4">companyName*</h1>
  <img src="{{asset('images/userImg2.png')}}" alt="student Image" class="profile_img rounded-circle me-md-5 me-1 position-absolute end-0 top-50">
</div>
<div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-bottom-2">
  <div class="col-8 d-inline-block">
    <p><i class="bi bi-briefcase-fill me-2"></i>Industry</p>
    <p><i class="bi bi-globe2 me-2"></i>Website</p>
    <p><i class="bi bi-envelope-fill me-2"></i>Email</p>
    <p><i class="bi bi-telephone-fill me-2"></i>Phone</p>
    <p><i class="bi bi-linkedin me-2"></i>Linkedin</p>
  </div>
  <a class="btn btn-sm btn-primary bg-dark-blue text-light px-3 mt-5 me-md-4 w-auto float-end" 
  href="{{route('hr_edit_company_profile')}}">Edit Profile</a>
</div>

</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Description </p>
<p class="">gggggggggggg</p>
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Branches </p>
<p class="">gggggggggggg</p>
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
    </div>
    <div class="d-flex text-body-secondary pt-3">
      <img src="{{asset('images/userImg.png')}}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" ></img>
      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark mb-1">EmployeeName (Role)</strong>
        <i class="bi bi-envelope-fill me-2"></i>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <i class="bi bi-telephone-fill me-2"></i>Phone
      </p>
</div>
</section>
@endsection