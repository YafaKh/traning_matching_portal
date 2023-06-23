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
            <input type="text" class="form-control me-3 ps-4" id="fname" placeholder="First" name="first_name" value="{{ old('first_name')}}">
            <input type="text" class="form-control ps-4" id="sname" placeholder="Second" name="second_name" value="{{ old('second_name')}}">
        </div>
        <div class="d-flex mb-4">
            <input type="text" class="form-control me-3 ps-4" id="thname" placeholder="Third" name="third_name" value="{{ old('third_name')}}">
            <input type="text" class="form-control ps-4" id="lname" placeholder="Last" name="last_name" value="{{ old('last_name')}}">
        </div>
        @error('first_name') 
          <div class="alert alert-danger">
              <strong>Error!</strong> {{ $message }}
          </div> 
        @enderror
        @error('second_name') 
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ $message }}
        </div> 
        @enderror
        @error('third_name') 
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ $message }}
        </div> 
        @enderror
        @error('last_name') 
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ $message }}
        </div> 
        @enderror
        <div class="form-group row mb-4 px-2">
            Profile Image:
            <input class="form-control ps-4  opacity-75" type="file" name="image"  id="formFile">
        </div>
        @error('last_name') 
        <div class="alert alert-danger">
            <strong>Error!</strong> {{ $message }}
        </div> 
        @enderror
        <input type="text" class="form-control mb-4 ps-4" id="phone" placeholder="Phone Number" name="phone" value="{{ old('phone')}}">
        @error('phone') 
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div> 
        @enderror
        <input type="text" class="form-control mb-4 ps-4" id="email" placeholder="Email" name="email" value="{{ old('email')}}">
        @error('email') 
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div> 
        @enderror
        <select id="company" class="form-select mb-4 ps-4" name="company_id">
            <option selected>Company</option>
            @foreach($companies as $company)
            <option value="{{$company['id']}}">{{$company['name']}}</option>
            @endforeach

        </select>
        @error('company_id') 
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div> 
       @enderror
        <button id="toggle-section-button" class="btn btn-secondary mb-4">
          new company</button>
<section id="hidden-section" class="d-none">
  <div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 rounded-bottom-2 w-100">
    <div class="col-12 d-inline-block">  
    <input type="text" class="form-control mb-4 ps-4" name="company_name" value="{{ old('company_name')}}" placeholder="Name">
    @error('company_name') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    <input type="text" class="form-control mb-4 ps-4" name="company_industry" value="{{ old('company_industry')}}" placeholder="Industry">
    @error('company_industry') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    <input type="text" class="form-control mb-4 ps-4" name="company_website" value="{{ old('company_website')}}" placeholder="Website">
    @error('company_website') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    <input type="text" class="form-control mb-4 ps-4" name="company_phone" value="{{ old('company_phone')}}" placeholder="Phone">
    @error('company_phone') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    <input type="text" class="form-control mb-4 me-2 ps-4" name="company_email" value="{{ old('company_email')}}" placeholder="Main Email">
    @error('company_email') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    <input type="text" class="form-control mb-4 ps-4" name="company_linkedin" value="{{ old('company_linkedin')}}" placeholder="LinkedIn">
    @error('company_linkedin') 
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $message }}
    </div> 
    @enderror
    </div>
  </div>
  
 </section>
      <div class="d-flex flex-sm-row flex-column" >
          <input type="password" class="form-control me-3 mb-4 ps-4" id="password" placeholder="Password" name="password">
          <input type="password" class="form-control mb-4 ps-4" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
      </div>
      @error('password') 
          <div class="alert alert-danger">
              <strong>Error!</strong> {{ $message }}
          </div> 
      @enderror
      <button type="submit" class="btn w-50 mx-auto btn-primary bg-dark-blue text-light">Submit</button>      
  </div>
</form>
</div>
<script>
 // jQuery code
 $(document).ready(function() {
  $('#toggle-section-button').click(function(event) {
    event.preventDefault();
    $('#hidden-section').toggleClass('d-none d-block');
    const companyDropdown = document.getElementById('company');
    companyDropdown.disabled = !companyDropdown.disabled;
  });
});
</script>
@endsection