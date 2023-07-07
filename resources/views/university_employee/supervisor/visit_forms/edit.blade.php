@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id == 2)
        @include('university_employee.supervisor.navbar')
    @else
        @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('content')
<div class="px-2">
    <section class="">
        <div class="position-relative col-md-9 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
            <h1 class="text-light mb-4">Edit Visit</h1>
        </div>
        <div class="col-md-9 bg-white mb-3 p-md-5 px-3 mx-auto rounded-bottom-2">
            <div class="d-flex flex-row">
                <div class="me-5">
                    <p>Student Name</p>
                    <p>{{$student->first_name_en}} {{$student->last_name_en}}</p>
                    <hr>
                </div>
                <div class="ms-5">
                    <p>Company</p>
                    <p>{{$student->training->branch->company->name ??''}}</p>
                    <hr>
                </div>
            </div>
        </div>
    </section>

    <form method="POST" action="{{ route('update_visit', ['user_id' => $user->id, 'student_id' => $student->id, 'visit_id' => $visit->id]) }}">
        @csrf
        @method('PUT')
        <section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
            <div class="d-flex flex-row">
                <p>Visit Date:</p>
                <input type="date" name="date" class="ms-3 col-sm-5 col-8" value="{{ $visit->visit_date }}">  
            </div>
            <div class="d-flex flex-row mt-3">
                <p>Visit Time:</p>
                <input type="time" name="time" class="ms-3 col-sm-5 col-8" value="{{ $visit->visit_time }}">  
            </div>
            <div class="d-flex flex-row mt-3">
                <p>Visit Way:</p>
                <div class="col-sm-5 col-8">
                    <select class="form-select ms-3 mb-2 txt-sm w-100" name="visit_way">
                        <option value="0" {{ $visit->contact_way == 0 ? 'selected' : '' }}>Online</option>
                        <option value="1" {{ $visit->contact_way == 1 ? 'selected' : '' }}>On-site</option>
                    </select>
                </div>
            </div>
            <p>Report:</p>
            <textarea class="col-10" style="height: 200px;" name="report">{{ $visit->report }}</textarea>
        </section>

        <!-- Display errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="text-center">
            <button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection