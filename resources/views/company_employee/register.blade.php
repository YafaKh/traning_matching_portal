@extends('all_users.master')
@section('content')
<div class="pt-3 d-flex flex-column">
    <img src="{{asset('images/logo_title.png')}}" alt="Logo" class="col-md-4 col-7 mx-auto">
    <form enctype="multipart/form-data" action="{{route('company_employee_store')}}" method="POST">
     @csrf
    <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
        <label class="form-label fs-3 mx-auto mb-3">Sign up</label>
        <label class="form-label mt-2 ms-1 fs-5">Name: </label>
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-3 ps-4" id="fname" placeholder="First" name="first_name">
            <input type="text" class="form-control ps-4" id="sname" placeholder="Second" name="second_name">
        </div>
        <div class="d-flex mb-4">
            <input type="text" class="form-control me-3 ps-4" id="thname" placeholder="Third" name="third_name">
            <input type="text" class="form-control ps-4" id="lname" placeholder="Last" name="last_name">
        </div>
        <input type="text" class="form-control mb-4 ps-4" id="phone" placeholder="Phone Number" name="phone">
        <input type="text" class="form-control mb-4 ps-4" id="email" placeholder="Email" name="email">
        <select id="company" class="form-select mb-4 ps-4" name="company_id">
            <option selected>Company</option>
            @foreach($companies as $company)
            <option value="{{$company['id']}}">{{$company['name']}}</option>
            @endforeach

        </select>

        <button id="toggle-section-button" class="btn btn-secondary mb-4">new company</button>
<section id="hidden-section" class="d-none">
<div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 rounded-bottom-2 w-100">
  <div class="col-12 d-inline-block">
  <input type="text" class="form-control mb-4 ps-4" name="industry" value="" placeholder="Industry">
  <!-- <div class="alert alert-danger">
      <strong>Error!</strong> 
  </div> -->
    <input type="text" class="form-control mb-4 ps-4" name="website" value="" placeholder="Website">
  <!-- <div class="alert alert-danger">
    <strong>Error!</strong>
  </div> -->
    <div id="email-container">
     
        <div class="d-flex">
          <input type="text" class="form-control mb-4 me-2 ps-4" name="email" value="" placeholder="Emails">
          <!-- <button class="btn delete"><i class="bi bi-trash3 fs-6 text-danger float-start"></i></button> -->
        </div>
        <!-- <div class="alert alert-danger"></div> -->
    </div>
    <!-- <div class="input-group mb-3">
      <span class="input-group-text" onClick="add_input('email')">
        <i class="bi bi-plus-square fs-6"></i>
      </span>
      <input type="text" class="form-control ps-4" name="new_email" placeholder="New Email">
    </div> -->
    <div id="phone-container">
        <div class="d-flex">
          <input type="text" class="form-control mb-4 me-2 ps-4" name="phone" value="" placeholder="Phones">
          <!-- <button class="btn delete"><i class="bi bi-trash3 fs-6 text-danger float-start"></i></button> -->
        </div>
        <!-- <div class="alert alert-danger"></div> -->
    </div>
    <!-- <div class="input-group mb-3">
      <span class="input-group-text" onClick="add_input('phone')">
        <i class="bi bi-plus-square fs-6"></i> 
      </span>
      <input type="text" class="form-control ps-4" name="new_phone" placeholder="New Phone">
    </div> -->
    
  <input type="text" class="form-control mb-4 ps-4" name="linkedin" value="" placeholder="LinkedIn">
   <!-- <div class="alert alert-danger">
      <strong>Error!</strong>
</div> -->
  </div>
</div>
</section>
        <div class="d-flex flex-sm-row flex-column">
            <input type="password" class="form-control me-3 mb-4 ps-4" id="password" placeholder="Password" name="password">
            <input type="password" class="form-control mb-4 ps-4" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
        </div>
        <button type="submit" class="btn w-50 mx-auto btn-primary bg-dark-blue text-light">Submit</button>      
    </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 // jQuery code
 $(document).ready(function() {
  $('#toggle-section-button').click(function(event) {
    event.preventDefault();
    $('#hidden-section').removeClass('d-none').addClass('d-block');
  });
});

</script>
@endsection