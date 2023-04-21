@extends('university_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<div class="pt-3 d-flex flex-column">
    <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
        <label class="form-label mt-2 ms-1 fs-5" for="email">Emploee Email: </label>
        <input type="text" class="form-control mb-4 ps-4" id="email">
        <button type="submit" class="btn w-25 mx-auto btn-primary bg-dark-blue text-light">Add</button>      
    </div>
</div>
@endsection