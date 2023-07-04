@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity1')
    active
@endsection
@section('sub_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-sm-row flex-column mt-5 pb-3">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" id="registration_state" aria-label="Registration_state">
            <option selected>Registration state</option>
            <option value="1">registered</option>
            <option value="0">not-registered</option>
        </select>

        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="3">
            <option value="All">Specialization</option>
            @foreach($specializations as $specialization)
            <option value="{{$specialization['acronyms']}}">{{$specialization['acronyms']}}</option>
            @endforeach
        </select>

        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="4">
            <option value="All">Company</option>
            <option value="-">Unengaged Sudents</option>
            @foreach($companies as $company)
                @foreach($company->branches as $branch)
                <option value="{{$company['name']}}-{{$branch->city->name}}">{{$company['name']}}-{{$branch->city->name}}</option>
                @endforeach
            @endforeach
        </select>
        
        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm " data-column="5">
            <option value="All">Supervisor</option>
            @foreach($supervisors as $supervisor)
            <option value="{{ $supervisor['first_name']}} {{ $supervisor['last_name']}}">
            {{ $supervisor['first_name']}} {{ $supervisor['last_name']}}
            </option>
            @endforeach
        </select>
        <button type="button" class="btn bg-mid-sand border mb-2 me-2"
        data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-bs-title="delete selected"><i class="bi bi-trash3 py-0 fs-6 text-danger"></i>
        </button>
        <button type="button" class="btn h-50 btn-primary bg-dark-blue text-light opacity-75 px-3">Report</button>
    </div>
    {{--Upload registered students list--}}
    <div class="d-flex flex-sm-row flex-column justify-content-between mb-2">
        <label class="txt-xsm pb-1 h-50 mt-auto">Note: students whose names are highlighted in red are not registered for the internship on the portal.</label>
        <form action="{{route('update_register_list', ['user_id'=>$user->id])}}"  method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-1">
                <label for="formFileSm" class="form-label txt-sm">Upload registered students IDs list (.txt), ID per line.</label>
                <div class="d-flex flex-row">
                    <input class="form-control form-control-sm w-auto me-2" id="formFileSm" name="register_list" type="file">
                    <button type="submit" class="btn btn-primary bg-dark-blue btn-sm text-light opacity-75 h-50 px-3"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Update registration state">Update
                    </button>
                </div>
            </div>
            @error('register_list') 
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
            @enderror
        </form>
    </div>
        
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
            <th scope="col">University ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Supervisor</th>
            <th scope="col">Go to student's</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach($students as $student)
            <tr>
            <td class="ps-3"><input class="table-checkbox form-check-input" type="checkbox" id="check-all1" onClick="check_all_check_boxes('check-all1', 'table1')"></td>                
            <td>{{$student['student_num']}}</td>
            <td class="registration-state-cell" data-registered="{{$student['registered']}}">
                @if($student['registered'])
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                {{$student['first_name_en']}} {{$student['last_name_en']}}
                </a>
                @else
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                <span class="text-danger">{{$student['first_name_en']}} {{$student['last_name_en']}}</span>
                </a>
                @endif
            </td>
            <td>{{$student->specialization->acronyms}}</td>
            <td>{{$student->training->branch->company->name ?? ''}}-{{$student->training->branch->city->name ?? ''}}</td>
            <td>{{$student->supervisor['first_name'] ?? ''}} {{$student->supervisor['last_name'] ?? ''}}</td>
            <td>
            <select class="form-select txt-sm w-auto" aria-label="Go_to">
                <option value="Progress" selected>Progress</option>
                <option value="Visit_forms">Visit forms</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Assessment">Company evaluation</option>
                <option value="Assessment">Assessment</option>
            </select>
            </td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('coordinator_delete_student', ['student_id' => $student->id, 'user_id'=>$user->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    {{$students->links()}}
</div>
<script>
    // Get reference to the registration state select dropdown
    const registrationStateSelect = document.querySelector('#registration_state');

    // Add event listener to the registration state select dropdown
    registrationStateSelect.addEventListener('change', filterTable);

    function filterTable() {
        // Get the selected registration state value
        const selectedRegistrationState = registrationStateSelect.value;

        // Get all rows in the table body
        const rows = document.querySelectorAll('#table-body tr');

        // Iterate over each row and show/hide based on the selected registration state
        rows.forEach((row) => {
            const registrationStateCell = row.querySelector('.registration-state-cell');
            const isRegistered = registrationStateCell.dataset.registered === '1';

            if (selectedRegistrationState === '1' && isRegistered) {
                row.style.display = '';
            } else if (selectedRegistrationState === '0' && !isRegistered) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

@endsection