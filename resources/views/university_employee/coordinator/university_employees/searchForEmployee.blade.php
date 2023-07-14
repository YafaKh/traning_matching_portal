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
            <form class="input-group mb-2 h-50 w-50" role="searprimarych" type="get" action="{{route('search.coordinator.universityEmployee',['user_id' => $user->id])}}">
            <input class="form-control txt-sm border border-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-title="Search by the employee's number or name" name="search"  type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form> 
        </div>
        <a href="{{route('coordinator_add_employee', ['user_id'=>$user->id])}}"
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
            </tr>
            <tr >
            <th scope="col" class="ps-3">ID</th>
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
            <td class="ps-3">{{$employee['employee_num']}}</td>
            <td>{{$employee['first_name']}} {{$employee['last_name']}}</td>
            <td>
            <form action="{{ route('coordinator_update_role', ['employee_id' =>$employee['id'], 'user_id'=>$user->id]) }}" class="d-flex">
                @csrf
                <select class="form-select border-gray me-2 mb-2 txt-sm" name="role" disabled id="roleDropdown_{{ $employee['id'] }}">
                    <option value="1" {{ $employee['university_employee_role_id'] == 1 ? 'selected' : '' }}>Coordinator</option>
                    <option value="2" {{ $employee['university_employee_role_id'] == 2 ? 'selected' : '' }}>Supervisor</option>
                    <option value="3" {{ $employee['university_employee_role_id'] == 3 ? 'selected' : '' }}>Coordinator & Supervisor</option>
                </select>
                <div>
                    <button type="button" class="btn p-0" onclick="enableDropdown({{ $employee['id'] }})">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="submit" class="btn p-0" onClick="return confirm('Are you sure?')">
                        <i class="bi bi-check-square-fill"></i>
                    </button> 
                </div>
            </form>
            </td>
            <td>{{$employee['email']}}</td>
            <td>{{$employee['phone']}}</td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('coordinator_delete_employee', ['employee_id' => $employee->id, 'user_id'=>$user->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <a class="btn btn-secondary" href="{{route('coordinator_list_employees',['user_id' => $user->id])}}">Back</a>

</div>
<script>
    // to enable tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    function enableDropdown(employeeId) {
        document.getElementById("roleDropdown_" + employeeId).disabled = false;
    }
</script>
@endsection