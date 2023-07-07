@extends('all_users.company_profile')

@section('navbar')
    @include('student.layout.navbar')
@endsection
@section('edit_profile_btn')
<a class="btn editBtn" href="{{route('student_evaluate_company',['user_id'=> $user->id])}}" role="button">Evaluate Company</a>
@endsection