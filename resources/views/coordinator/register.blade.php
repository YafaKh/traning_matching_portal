@extends('coordinator.layout.master')
@section('content')
<div class="pt-3 d-flex flex-column">
    <img src="{{asset('images/logo_title.png')}}" alt="Logo" class="col-md-4 col-7 mx-auto">
    <div class="d-flex flex-column p-5 mt-3 col-md-8 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
        <label class="form-label fs-3 mx-auto mb-3">Sign up</label>
        <label class="form-label mt-2 ms-1 fs-5">Name (Arabic): </label>
        <div class="d-flex">
            <input type="text" class="form-control me-3" id="fname" placeholder="First">
            <input type="text" class="form-control" id="lname" placeholder="Second">
        </div>
    </div>
</div>
@endsection