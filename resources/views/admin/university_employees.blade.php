@extends('all_users.master')
@section('navbar')
  @include('admin.navbar')
@endsection
@section('activity1')
    active
@endsection
@section('content')
<div class="container p-4">
    <strong class="fs-5 ms-1 txt-dark-sand">Arab American University Employees:</strong>
    <a href="{{route('admin_add_university_employee')}}" class="btn ms-3 btn-primary bg-dark-blue text-light mb-3">Accept University Admin</a>      
    <div class="row">
        @foreach($employees as $employee)
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="d-flex flex-column h-100 bg-light align-items-center p-3 rounded-3 shadow">
                <div>
                    <p class="txt-dark-blue"><strong>{{$employee['first_name'].' '. $employee['last_name']}}</strong>
                    (@if ($employee['university_employee_role_id']==1)
                        coordinator
                    @elseif ($employee['university_employee_role_id']==2)
                        supervisor
                    @elseif ($employee['university_employee_role_id']==3)
                        coordinator & supervisor
                    @endif)</p>
                    <hr>
                    <i class="bi bi-envelope-fill me-2">{{$employee['email']}}</i><br>
                    <i class="bi bi-telephone-fill me-2">{{$employee['phone']}}</i>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
