@extends('all_users.student_profile')
@if($user->university_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection