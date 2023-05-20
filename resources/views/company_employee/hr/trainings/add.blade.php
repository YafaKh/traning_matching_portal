@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('Trainings_activity')
    active
@endsection
@section('content')
<form enctype="multipart/form-data" action="{{route('hr_store_training', ['company_id' => $company_id])}}" method="POST">
    @csrf
    <div class="pt-5 d-flex flex-column col-md-8 col-11 mx-auto ">  
        <div class="d-flex flex-sm-row flex-column mt-4 mb-2 mx-auto col-12">
            <select class="form-select border-gray me-2 mb-2  flex-grow-1" name="semester">
                <option selected>Semester</option>
                <option value="1">Fall</option>
                <option value="2">Spring</option>
                <option value="3">First Summer</option>
                <option value="4">Second Summer</option>
            </select>
            <select class="form-select border-gray me-2 mb-2  flex-grow-1" name="branch">
                <option selected>Branch</option>
                @foreach($branches as $branche)
                <option value="{{$branche['id']}}">{{$branche['address']}}</option>
                @endforeach
            </select>
            <select class="form-select border-gray me-2 mb-2 flex-grow-1" name="trainer">
                <option selected>Trainer</option>
                @foreach($trainers as $trainer)
                <option value="{{$trainer['id']}}">
                {{ $trainer['first_name'] ?? '' }} 
                {{ $trainer['last_name'] ?? '' }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Training Name" />
            <label for="floatingInput">Training Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="training_feild" name="training_feild" placeholder="Training Feild" />
            <label for="floatingInput">Training Feild</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" id="details" name="Details" placeholder="details" ></textarea >
            <label for="floatingInput">Details</label>
        </div>
        <button type="submit" class="btn w-25 mx-auto mt-4 btn-primary bg-dark-blue text-light">Add</button> 
    </div>
</form>
@endsection