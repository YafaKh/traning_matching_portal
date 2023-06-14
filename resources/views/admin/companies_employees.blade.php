@extends('all_users.master')
@section('navbar')
  @include('admin.navbar')
@endsection
@section('activity1')
    active
@endsection
@section('content')
<div class="container p-5">
    <div class="row">
        @foreach($companies as $company)
        <div class="col-md-12">
            <h3>{{$company['name']}} Employees:</h3>
        </div>
        <div class="col-md-12">
            <div class="row row-cols-2">
                @foreach($company->employees as $employee)
                <div class="col">
                    <div class="d-flex h-75 w-100 bg-light align-items-center company-box p-3 m-4 rounded-3 shadow">
                        <img src="{{$employee->image}}" alt="employee img" class="rounded-circle col-6 w-25 h-100 me-4" />
                        <div class="mt-4">
                            <strong>{{$employee['first_name'].' '. $employee['last_name']}}</strong>
                            (@if ($employee['company_employee_role_id']==1)
                                HR
                            @elseif ($employee['company_employee_role_id']==2)
                                Trainer
                            @elseif ($employee['company_employee_role_id']==3)
                                HR & Trainer
                            @endif)<br>
                            <i class="bi bi-envelope-fill me-2">{{$employee['email']}}</i><br>
                            <i class="bi bi-telephone-fill me-2">{{$employee['phone']}}</i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
{{$companies->links()}}
</div>
@endsection
