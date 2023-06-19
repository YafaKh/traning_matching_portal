@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity2')
    active
@endsection
@section('sub_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
        
    {{-- students table --}}
    <div class="table-responsive mt-5 d-flex justify-content-center ">
        <table class="table border w-75">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3" >ID</th>
            <th scope="col">Name</th>
            <th scope="col">Student's preferences</th>
            <th scope="col">Companies</th>
            <th scope="col">Approve</th>
            </tr>
        </thead>
        <tbody class="bg-light">
        @foreach($students as $student)
            <tr>
            <td class="ps-3">{{$student['student_num']}}</td>
            @if($student['registered'])
            <td>{{$student['first_name_en']}} {{$student['last_name_en']}}</td>
            @else 
            <td class="text-danger">{{$student['first_name_en']}} {{$student['last_name_en']}}</td>
            @endif            
            <td>
                <ul>
                    <li class="mt-2 mb-3">{{$stydent->n}}</li>
                </ul>
            </td>
            <td>
                <ul>
                @foreach($student->not_approved_companies as $not_approved_company)
                    <li class="mt-2 mb-3">{{$not_approved_company->company->name}}</li>
                @endforeach
                </ul>
            </td>
            <td class="">
            @foreach($student->not_approved_companies as $not_approved_company)
            <a type="button" class="btn h-50 btn-sm mt-1 mb-2 txt-sm btn-primary bg-dark-blue text-light opacity-75 ms-2"
            href="{{ route('coordinator_student_company_approve', ['not_approved_student_company' =>$not_approved_company]) }}">
            <i class="bi bi-check-square"></i></a><br>
            @endforeach
            </td>
            
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection