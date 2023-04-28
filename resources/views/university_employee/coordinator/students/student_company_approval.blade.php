@extends('university_employee.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity2')
    active
@endsection
@section('student_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
        
    {{-- students table --}}
    <div class="table-responsive mt-5 d-flex justify-content-center ">
        <table class="table txt-sm border table-hover w-75">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3" >Name</th>
            <th scope="col">Companies</th>
            <th scope="col">Approve</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3" >****</td>
            <td>
                <ul>

                </ul>
            </td>
            <td><button type="button" class="btn h-50 btn-sm txt-sm btn-primary bg-dark-blue text-light opacity-75 ms-2"><i class="bi bi-check-square"></i></button></td>
        </tbody>
        </table>
    </div>
</div>
@endsection