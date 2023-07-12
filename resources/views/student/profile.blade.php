@extends('all_users.student_profile')
@section('navbar')
  @include('student.navbar')
@endsection

@section('edit_profile_btn')
<a class="btn editBtn" href="{{route('edit_student_profile',['user_id'=> $user->id])}}" role="button">Edit Profile</a>
@endsection