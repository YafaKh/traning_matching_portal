@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex justify-content-between flex-sm-row flex-column mt-5">
        <div class="d-flex flex-row col-sm-7">
           
        </div>
        <a href="{{route('hr_add_employee', ['user_id'=>$user->id])}}"
        class="btn btn-sm btn-primary bg-dark-blue text-light opacity-75 px-3 w-auto h-50">
        Add Employee</a> 
    </div>
        
    {{-- Employees table--}}
    <div class="table-responsive mt-3">
        <table class="table txt-sm table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr class="rounded-top">
                <td colspan="4"><label class="form-label mt-2 ms-3 fs-6">
                Employees</label>
                </td>
                <td><button type="button" class="btn" 
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="delete selected"><i class="bi bi-trash3 fs-6 text-danger"></i>
                    </button>
                </td>
            </tr>
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach ($employees_data as $employee)
            <tr>
            <td class="ps-3">{{$employee['first_name'].' '. $employee['last_name']}}</td>
            <td>
            <form action="{{ route('hr_update_role', ['user_id'=>$user->id, 'employee_id' => $employee['id']]) }}" class="d-flex">
            @csrf
            <select class="form-select border-gray me-2 mb-2 txt-sm" name="role" disabled id="roleDropdown_{{ $employee['id'] }}">
                <option value="1" {{ $employee['company_employee_role_id'] == 1 ? 'selected' : '' }}>HR</option>
                <option value="2" {{ $employee['company_employee_role_id'] == 2 ? 'selected' : '' }}>Trainer</option>
                <option value="3" {{ $employee['company_employee_role_id'] == 3 ? 'selected' : '' }}>HR & Trainer</option>
            </select>
            <div>
                <button type="button" class="btn p-0" onclick="enableDropdown({{ $employee['id'] }})">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button type= "submit" class="btn p-0" onClick="return confirm('Are you sure?')">
                    <i class="bi bi-check-square-fill"></i>
                </button> 
            </div>
            </form>
            </td>
            <td>{{$employee['email']}}</td>
            <td>{{$employee['phone']}}</td>
            <td>
                <a class="btn"
                href="{{ route('hr_delete_employee', ['user_id'=>$user->id, 'employee_id' => $employee->id]) }}"
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
<script>
    function enableDropdown(employeeId) {
        document.getElementById("roleDropdown_" + employeeId).disabled = false;
    }
</script>
@endsection