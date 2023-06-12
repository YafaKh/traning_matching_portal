@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<form method="POST" class="w-auto" action="{{ route('coordinator_stroe_employee') }}" id="assign_trainee_form">
@csrf
<div class="pt-3 d-flex flex-column">
    <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
        <label class="form-label my-4 ms-1 fs-5" for="email">Emploee's University Email: </label>
        <select class="form-select " name="email">
            @foreach($un_added_employees as $employee)
            <option value="{{$employee['id']}}">{{$employee['email']}}</option>
            @endforeach
        </select>
        @error('email')
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
        @enderror
        <label class="form-label mt-2 ms-1 fs-5" for="erolemail">Role: </label>
        <select class="form-select mb-4 ps-4" aria-label="Role" name="role">
            <option value="">Role</option>
            <option value="1">Coordinator</option>
            <option value="2">Supervisor</option>
            <option value="3">Both</option>
        </select>
        @error('role')
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn w-25 mx-auto mt-5 btn-primary bg-dark-blue text-light">Add</button>      
    </div>
</div>
</form>
@endsection