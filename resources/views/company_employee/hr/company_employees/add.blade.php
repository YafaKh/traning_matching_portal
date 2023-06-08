@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<div class="pt-3 d-flex flex-column">
    <form enctype="multipart/form-data" action="{{route('hr_store_employee', ['company_id' => $company_id])}}" method="POST">
        @csrf
        <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
            <label class="form-label mt-2 ms-1 fs-5" for="employee">Emploee Email: </label>
            <select class="form-select mb-4 ps-4" aria-label="Supervisor" name="email">
                <option selected>Email</option>
                @foreach($un_added_employees as $un_added_employee)
                <option value="{{$un_added_employee['id']}}">
                    {{$un_added_employee['email']}}
                </option>
                @endforeach
            </select>
            @error('email')
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
            @enderror
            <label class="form-label mt-2 ms-1 fs-5" for="erolemail">Role: </label>
            <select class="form-select mb-4 ps-4" aria-label="Role" name="role">
                <option selected>Role</option>
                <option value="1">HR</option>
                <option value="2">Trainer</option>
                <option value="3">Both</option>
            </select>
            @error('role')
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
             @enderror
            <button type="submit" class="btn w-25 mx-auto btn-primary bg-dark-blue text-light">Add</button>      
        </div>
    </form>
</div>
@endsection