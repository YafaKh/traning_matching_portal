@extends('company_employee.master')
@section('content')
<div class="pt-3 d-flex flex-column">
    <img src="{{asset('images/logo_title.png')}}" alt="Logo" class="col-md-4 col-7 mx-auto">
    <form enctype="multipart/form-data" action="{{route('company_employee_store')}}" method="POST" >
     @csrf
     @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif  
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
        </select>
        <select id="role" class="form-select mb-4 ps-4" name="employees_roles">
            <option selected>Role</option>
            <option value="1">HR</option>
            <option value="2">Trainer</option> 
            <option value="3">Both</option>
        </select>
        <div class="d-flex flex-sm-row flex-column">
            <input type="password" class="form-control me-3 mb-4 ps-4" id="password" placeholder="Password" name="password">
            <input type="password" class="form-control mb-4 ps-4" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
        </div>
        <button type="submit" class="btn w-50 mx-auto btn-primary bg-dark-blue text-light">Submit</button>      
    </div>
    </form>
</div>
@endsection