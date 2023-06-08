@extends('all_users.master')

@section('content')
<section class="">
<div class="position-relative col-md-9 col-11 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
  <h1 class="text-light mb-4">{{$company_data['name']}}</h1>
  <img src="{{ asset('assets/img/' . $company_data['image']) }}" alt="profile Image" class="profile_img rounded-circle border border-5 me-md-5 me-1 position-absolute end-0 top-50">
</div>
<div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-bottom-2">
  <div class="col-8 d-inline-block">
    <p><i class="bi bi-briefcase-fill me-2"></i>{{$company_data['industry']}}</p>
    <p><i class="bi bi-globe2 me-2"></i>{{$company_data['website']}}</p>
    <div class="d-flex">
    <i class="bi bi-envelope-fill me-2"></i>
    <p>
    @foreach($company_data->emails as $email)
    {{$email['email_address']}}<br>
    @endforeach
    </p>
    </div>
    <div class="d-flex">
    <i class="bi bi-telephone-fill me-2"></i>
    <p>
    @foreach($company_data->phones as $phone)
    {{$phone['phone_no']}}<br>
    @endforeach
    </p>
    </div>
    <p><i class="bi bi-linkedin me-2"></i>{{$company_data['linkedin']}}</p>
  </div>
  @yield('edit_profile_btn')
</div>

</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Description </p>
<p class="">{{$company_data['description']}}</p>
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Branches </p>
@foreach($company_data->branches as $branch)
<p>{{$branch->city->name}}-{{$branch['address']}}</p>
@endforeach
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<h6 class="border-bottom pb-2 mb-0">Contact persons</h6>
@foreach($contactable_employees as $contactable_employee)
    <div class="col-lg-7 pt-3">
      <div class="d-flex">
        <img src="{{ asset('images/' . $contactable_employee['image']) }}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
        <strong class="d-block text-gray-dark mb-1">
            {{$contactable_employee['first_name'].' '.$contactable_employee['last_name']}}&emsp;
            (
            @if ($contactable_employee['company_employee_role_id']==1)
                  hr
              @elseif ($contactable_employee['company_employee_role_id']==2)
                  trainer
              @elseif ($contactable_employee['company_employee_role_id']==3)
                  hr & trainer
              @endif
              )
          </strong>
        </div>
        <div class="d-flex flex-md-row flex-column justify-content-between ms-5">
          <i class="bi bi-envelope-fill me-2">{{$contactable_employee['email']}}</i>
          <i class="bi bi-telephone-fill me-2">{{$contactable_employee['phone']}}</i>
        </div>
        <hr>
    </div>
@endforeach
</section>
@endsection