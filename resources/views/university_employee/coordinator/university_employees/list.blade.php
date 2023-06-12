@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex justify-content-between flex-sm-row flex-column mt-5">
        <div class="d-flex flex-row col-sm-6">
            <select class="form-select border-gray me-2 mb-2 txt-sm w-25" aria-label="Supervisor">
                <option selected>Role*</option>
                <option value="1">*****</option>
            </select>
            <select class="form-select border-gray me-2 mb-2 txt-sm w-25" aria-label="Company">
                <option selected>Department*</option>
                <option value="CS">CS</option>
            </select>
            <form class="input-group mb-2 h-50 w-50" role="searprimarych">
            <input class="form-control txt-sm border border-secondary" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form> 
        </div>
        <a href="{{route('coordinator_add_employee')}}"
        class="btn btn-sm btn-primary bg-dark-blue text-light opacity-75 px-3 w-auto h-50">
        Add Employee</a>      
    </div>
        
    {{-- Employees table--}}
    <div class="table-responsive mt-3">
        <table class="table txt-sm table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr class="rounded-top">
                <td colspan="6"><label class="form-label mt-2 ms-3 fs-6">
                Employees</label>
                </td>
                <td><button type="button" class="btn bg-mid-sand border mb-2 me-2"
                data-bs-toggle="modal" data-bs-target="#deleteModal"
                data-bs-title="delete selected"><i class="bi bi-trash3 py-0 fs-6 text-danger"></i>
                </button>
                </td>
            </tr>
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="checkAll"></td>
            <th scope="col" >ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach($university_employees as $employee)
            <tr>
            <td class="ps-3"><input class="table-checkbox form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>{{$employee['employee_num']}}</td>
            <td>{{$employee['first_name']}} {{$employee['last_name']}}</td>
            <td>
            @if ($employee['university_employee_role_id']==1)
                coordinator
            @elseif ($employee['university_employee_role_id']==2)
                supervisor
            @elseif ($employee['university_employee_role_id']==3)
                coordinator & supervisor
            @endif
            </td>
            <td>{{$employee['email']}}</td>
            <td>{{$employee['phone']}}</td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('coordinator_delete_employee', ['employee_id' => $employee->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection