@extends('all_users.company_profile')

@section('navbar')
    @include('student.layout.navbar')
@endsection
@section('edit_profile_btn')
<a class="btn editBtn" href="{{$user->evaluate_company_id ? route('student_show_evaluate_company',['user_id'=> $user->id]) :
    route('student_evaluate_company',['user_id'=> $user->id])}}" 
>Evaluate Company
</a>
@endsection