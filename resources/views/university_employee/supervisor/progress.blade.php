@extends('all_users.progress')
@section('navbar')
    @if($user->university_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('students_activity')
    active
@endsection