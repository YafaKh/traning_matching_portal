@extends('all_users.student_profile')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('company_employee.trainer.navbar')
    @else
    @include('company_employee.hr.navbar')
    @endif
@endsection