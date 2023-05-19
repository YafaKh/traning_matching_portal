@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('Trainings_activity')
    active
@endsection
@section('content')
<div class="pt-5 d-flex flex-column col-md-8 col-11 mx-auto ">
    <div class="d-flex flex-sm-row flex-column mt-4 mb-2 mx-auto col-12">
        <select class="form-select border-gray me-2 mb-2 flex-grow-1" aria-label="Supervisor">
            <option selected>Semester</option>
            <option value="HR">HR</option>
        </select>
        <select class="form-select border-gray me-2 mb-2  flex-grow-1" aria-label="Company">
            <option selected>Branch</option>
            <option value="CS">CS</option>
        </select>
        <select class="form-select border-gray me-2 mb-2 flex-grow-1" aria-label="Company">
            <option selected>Feild</option>
            <option value="CS">CS</option>
        </select>
    </div>
    <div class="form-floating">
        <input type="text" class="form-control mb-3" id="training_feild" name="Training Feild" placeholder="Training Feild" />
        <label for="floatingInput">Training Feild</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control" id="details" name="Details" placeholder="Details" ></textarea >
        <label for="floatingInput">Details</label>
    </div>
    <button type="submit" class="btn w-25 mx-auto mt-4 btn-primary bg-dark-blue text-light">Add</button> 
</div>
@endsection