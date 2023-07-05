@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity3')
    active
@endsection
@section('sub_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5 col-lg-11 mx-auto">
<form method="POST" class="w-auto" action="{{ route('coordinator_assign_supervisor', ['user_id'=>$user->id]) }}" id="assign_trainee_form">
    @csrf
    {{--filters--}}            
    <div class="d-flex flex-md-row flex-column mt-4 col-md-6">
        <label class="form-label me-3 mt-1 txt-sm text-nowrap">Choose a supervisor to assign students to: </label>
        <div class="w-auto">
            <select class="form-select txt-sm " id="supervisor-filter" name="supervisor">
                <option value=''>Supervisor</option>
                @foreach($supervisors as $supervisor)
                <option value="{{$supervisor['id']}}">{{$supervisor['first_name']}} {{$supervisor['last_name']}}</option>
                @endforeach
            </select>
            @error('supervisor')
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $message }}
                </div>
            @enderror
        </div>
    </div>        
    {{-- supervisor students table--}}
    <div class="table-responsive mt-2">
        <table class="table txt-sm border table-hover" id="table1">
        <thead class="bg-mid-sand">
            <tr class="rounded-top">
                <td colspan="6"><label class="form-label mt-2 ms-3 fs-6">
                    Assigned students</label>
                </td>
            </tr>
            <tr >
            <th scope="col"  class="ps-3">University ID</th>
            <th scope="col" >Name</th>
            <th scope="col" >Supervisor</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach($assigned_students as $assigned_student)
            <tr>
            <td class="ps-3">{{$assigned_student['student_num']}}</td>
            <td>
                @if($assigned_student['registered'])
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $assigned_student->id ]) }}">
                {{$assigned_student['first_name_en']}} {{$assigned_student['last_name_en']}}
                </a>
                @else
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $assigned_student->id ]) }}">
                <span class="text-danger">{{$assigned_student['first_name_en']}} {{$assigned_student['last_name_en']}}</span>
                </a>
                @endif
            </td> 
            <td>{{$assigned_student->supervisor->first_name}} {{$assigned_student->supervisor->last_name}}</td>
            <td>{{$assigned_student->training->branch->company->name ?? ''}}</td>
            <td>{{$assigned_student->training->branch->address ?? ''}}</td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('coordinator_unassign_supervisor', ['student_id' => $assigned_student->id, 'user_id'=>$user->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{$assigned_students->links()}}
    </div>
    {{--other students table--}}
    <div class="d-flex mt-2 flex-md-row col-md-6">
        <select class="form-select me-2 mb-2 txt-sm" aria-label="Company">
            <option value="All">Company</option>
            <option value="-">Unengaged Sudents</option>
            @foreach($companies as $company)
                @foreach($company->branches as $branch)
                <option value="{{$company['name']}}-{{$branch->city->name}}">{{$company['name']}}-{{$branch->city->name}}</option>
                @endforeach
            @endforeach
        </select>

        <select class="form-select me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch*</option>
            <option value="CS">CS</option>
        </select>  
    </div>
    <div class="table-responsive">
        <table class="table txt-sm table-sm border table-hover" id="table2">
        <thead class="bg-mid-sand">
        <tr class="rounded-top">
                <td colspan="4"><label class="form-label mt-2 ms-3 fs-6">
                    Other Students</label>
                </td>
                <td>
                <button type="submit" class="btn" id="assign_training">
                    <i class="bi bi-plus-square fs-5"></i>
                </button>
            </tr>
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox"  id="check-all2" onClick="check_all_check_boxes('check-all2', 'table2')"></th>
            <th scope="col" >University ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach($unassigned_students as $unassigned_student)
            <tr>
            <td class="ps-3"><input class="table2-checkbox form-check-input" type="checkbox" value="{{ $unassigned_student['id'] }}" name="students[]" id="flexCheckDefault"></td>                
            <td>{{$unassigned_student['student_num']}}</td>
            <td>
                @if($unassigned_student['registered'])
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $unassigned_student->id ]) }}">
                {{$unassigned_student['first_name_en']}} {{$unassigned_student['last_name_en']}}
                </a>
                @else
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $unassigned_student->id ]) }}">
                <span class="text-danger">{{$unassigned_student['first_name_en']}} {{$unassigned_student['last_name_en']}}</span>
                </a>
                @endif
            </td> 
            <td>{{$unassigned_student->training->branch->company->name ?? ''}}</td>
            <td>{{$unassigned_student->training->branch->address ?? ''}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</form>
</div>

<script>
    function assign_supervisor(student_id) {
        var form = document.getElementById('assign_trainee_form');
        form.action = form.action.replace(':student_id', student_id);
        if (confirm('Are you sure?')) {
        form.submit();
        }
    }
</script>
@endsection