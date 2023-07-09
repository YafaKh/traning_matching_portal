@extends('all_users.master')
@section('navbar')
@include('admin.navbar')
@endsection
@section('content')
<div class="pt-3 d-flex flex-column">
<form method="POST" class="w-auto" action="{{route('admin_store_university_employee')}}" id="assign_trainee_form">
@csrf
        <div class="d-flex flex-column px-6 py-4 my-3 col-md-7 col-11 mx-auto rounded-4 shadow bg-white  txt-dark-sand">
           <label>Please choose just the one how you want to set as admin to the university</label>
           <select class="form-select mt-3" name="employee">
                <option selected>Email</option>
                @foreach($employees as $employee)
                <option value="{{$employee['id']}}">{{$employee['email']}} ({{$employee['first_name']}} {{$employee['last_name']}})</option>
                @endforeach
            </select>
            @error('email')
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn w-25 mx-auto btn-primary bg-dark-blue text-light mt-4">Accept</button>      
        </div>
</form>
</div>
@endsection