@extends('all_users.master')
@section('navbar')
  @include('admin.navbar')
@endsection
@section('activity1')
    active
@endsection
@section('sub_navbar')
    @include('admin.companies_navbar')
@endsection
@section('content')
<div class="container px-5">
    <div class="row px-5">
        @foreach($companies as $company)
        <div class="col-md-6">
            <div class="d-flex flex-row bg-light align-items-center company-box justify-content-center w-100 py-3 m-4 rounded-3 shadow">
                <img src="{{ asset('assets/img/' . $company['image']) }}" class="rounded-circle border border-5" width="100" height="100"/>
                <div class="mt-4 mx-3 col-6">
                    <a href="{{route('admin_company_profile',['company_id' => $company->id])}}" 
                         class="text-decoration-none">{{$company->name}}</a>
                    <p>{{$company->industry}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
