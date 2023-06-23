@extends('all_users.company_profile')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection

@section('edit_profile_btn')
<a class="btn btn-sm btn-primary bg-dark-blue text-light px-3 mt-5 me-md-4 w-auto float-end" 
  href="{{route('hr_edit_company_profile', ['company_id' => $company_id, 'user_id'=>$user->id])}}">Edit Profile</a>
@endsection