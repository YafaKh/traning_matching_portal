@extends('coordinator.layout.master')
@section('content')
<div class="pt-3 d-flex flex-column">
    <img src="{{asset('images/logo_title.png')}}" alt="Logo" class="col-md-4 col-7 mx-auto">
    <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
        <label class="form-label fs-3 mx-auto mb-3">Sign up</label>
        <label class="form-label mt-2 ms-1 fs-5">Name (Arabic): </label>
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-3 ps-4" id="fname_ar" placeholder="First">
            <input type="text" class="form-control ps-4" id="sname_ar" placeholder="Second">
        </div>
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-3 ps-4" id="thname_ar" placeholder="Third">
            <input type="text" class="form-control ps-4" id="lname_ar" placeholder="Last">
        </div>
        <label class="form-label mt-2 ms-1 fs-5">Name (English): </label>
        <div class="d-flex mb-3">
            <input type="text" class="form-control me-3 ps-4" id="fname_en" placeholder="First">
            <input type="text" class="form-control ps-4" id="sname_en" placeholder="Second">
        </div>
        <div class="d-flex mb-4">
            <input type="text" class="form-control me-3 ps-4" id="thname_en" placeholder="Third">
            <input type="text" class="form-control ps-4" id="lname_en" placeholder="Last">
        </div>
        <input type="text" class="form-control mb-4 ps-4" id="id" placeholder="Emploee ID">
        <input type="text" class="form-control mb-4 ps-4" id="phone" placeholder="Phone Number">
        <input type="text" class="form-control mb-4 ps-4" id="phone" placeholder="University Email">
        <div class="d-flex flex-sm-row flex-column">
            <input type="password" class="form-control me-3 mb-4 ps-4" id="pass" placeholder="Password">
            <input type="password" class="form-control mb-4 ps-4" id="confirm_pass" placeholder="Confirm Password">
        </div>

    </div>
</div>
@endsection