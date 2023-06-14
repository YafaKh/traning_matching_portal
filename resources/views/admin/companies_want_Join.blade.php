@extends('all_users.master')
@section('navbar')
  @include('admin.navbar')
@endsection
@section('activity2')
    active
@endsection
@section('sub_navbar')
    @include('admin.companies_navbar')
@endsection
@section('content')
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto mt-3 rounded-2 shadow">
  @foreach($unadded_companies as $company)
    <div class="d-flex justify-content-between">
      <div class="col-md-7 col-9">
        <div class="d-flex">
          <strong class="d-block text-gray-dark mb-1">{{$company['name']}}</strong>
        </div>
        <div class="d-flex flex-md-row flex-column justify-content-between">
          <i class="bi bi-envelope-fill">{{$company['email']}}</i>
          <i class="bi bi-telephone-fill">{{$company['phone']}}</i>
        </div>
      </div>
      <div>
        <a class="btn btn-primary bg-dark-blue text-light my-3 flex-grow-1" type="button"
        href="{{route('admin_accept_company',[$company['id']])}}"
        onClick="confirm('Are you syure?')">Accept
        </a>
        <a class="btn btn-secondary text-light my-3 ms-1 flex-grow-1" type="button"
        href="{{route('admin_reject_company',[$company['id']])}}"
        onClick="confirm('Are you syure?')">Reject
        </a>
      </div>
      
    </div><hr>
@endforeach
  </section>

@endsection