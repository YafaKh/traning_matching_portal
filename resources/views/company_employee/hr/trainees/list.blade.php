@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity1')
    active
@endsection
@section('sub_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection 
@section('content')
<div class="px-3 d-flex flex-lg-row flex-column">       
    <div class="col-lg-9 mt-4 pe-3">
        {{--filters--}}
        <div class="d-flex ">
            <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="1">
                <option value="All">Training</option>
                @foreach($trainings as $training)
                    <option value="{{$training['name']}}">{{$training['name']}}</option>
                @endforeach
            </select>
            <form class="input-group flex-grow-1  mb-2" role="searprimarych">
                <input class="form-control txt-sm border  border-secondary-subtle" type="search" placeholder="Search Name" id="search">
                <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
                <i class="bi bi-search txt-xsm"></i>
                </button>
            </form>
        </div>
        <div class="mt-3">
            {{-- students table --}}
            <div class="table-responsive">
                <table class="table txt-sm table-sm border table-hover" id="table">
                <thead class="bg-mid-sand">
                    <tr >
                    <th scope="col" class="ps-3">Name</th>
                    <th scope="col">Training</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Trainer</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Evaluation</th>
                    </tr>
                </thead>
                <tbody class="bg-light" id="table-body">
                    @foreach ($trainings as $training)
                        @foreach ($training->students as $student)
                        <tr> 
                        <td class="ps-3">
                            <a class="link-dark link-underline-opacity-0 fw-bold" 
                             href="{{ route('hr_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                            {{$student['first_name_en'].' '. $student['last_name_en']}}
                            </a></td>
                        <td>{{$training['name']}}</td>
                        <td>{{$training->branch->city->name}}-{{$training->branch->address}}</</td>
                        <td>{{$training->employee->first_name}} {{$training->employee->last_name}}<//td>
                        <td><a type="button" class="btn" href="{{ route('hr_student_progress', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                            <i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                        <td><a type="button" class="btn" href="{{ route('hr_student_evaluation', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                            <i class="bi bi-box-arrow-up-right"></i></a>
                        </td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="border-start border-secondary col-lg-3 mt-4">
        <lable class="form-label ms-3 text-secondary fs-6">Unengaged Trainees :</lable>
        <div class="table-responsive ps-2" style="max-height: 300px;">
            <table class="table txt-sm table-sm border table-hover mt-2 ">
            <thead class="bg-mid-sand">
                <tr >
                <th scope="col" class="ps-3">Name</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($unengaged_trainees as $unengaged_trainee)
                <tr>
                <td class="ps-3">{{$unengaged_trainee['first_name_en'].' '.
                                $unengaged_trainee['last_name_en']}}
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <lable class="form-label ms-3 text-secondary fs-6">waiting for approval :</lable>
        <div class="table-responsive ps-2" style="max-height: 300px;">
            <table class="table txt-sm table-sm border table-hover mt-2">
            <thead class="bg-mid-sand">
                <tr >
                <th scope="col" class="ps-3">Name</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($not_aaproved_students as $not_aaproved_student)
                <tr>
                <td class="ps-3">{{$not_aaproved_student->student['first_name_en'].' '.
                                    $not_aaproved_student->student['last_name_en']}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection