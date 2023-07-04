@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('students_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-md-row w-auto flex-column mt-5 pb-3">
        <div class= "d-flex flex-row">
        <select class="form-select w-auto me-2 mb-2 txt-sm" aria-label="Specialization">
            <option selected>Specialization</option>
            <option value="CS">CS</option>
            <option value="MMT">MMT</option>
            <option value="GIS">GIS</option>
            <option value="CSE">CSE</option>
        </select>

        <select class="form-select w-auto me-2 mb-2 txt-sm" aria-label="Company">
            <option selected>Company</option>
            <option value="CS">CS</option>
        </select>
        </div>
        <div class= "d-flex flex-row w-auto">
        <select class="form-select w-auto me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch</option>
            <option value="CS">CS</option>
        </select>
        
        <select class="form-select w-auto me-2 mb-2 txt-sm " aria-label="Supervisor">
            <option selected>Training</option>
            <option value="CS">CS</option>
        </select>
        </div>
        <form class="input-group h-50 w-auto" role="searprimarych">
            <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
        </form>
    </div>
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            <th scope="col">Training</th>
            <th scope="col">Go to student's</th>
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
        @foreach($allStudents as $student)

            <tr>
            <td class="ps-3">{{$student ->student_num}}</td>
            <td>{{$student ->first_name_en}} {{$student ->second_name_en}} {{$student ->third_name_en}} {{$student ->last_name_en}}</td>
            <td>{{$student ->specialization->acronyms}}</td>
            <td>{{$student ->training->branch->company->name ?? "__"}}</td>
            <td>{{$student ->training->branch->address ?? "__"}}</td>

            @if($student ->training->semester ?? "__" == "1")
            <td>Fall - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '2')
            <td>Spring - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '3')
            <td>First Summer - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '4')
            <td>Second Summer - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == "__")
            <td>__</td>
            @endif
            <td>
            <a class="dropdown-toggle text-dark" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student's</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('student_visit_forms',['user_id' => $user->id])}}">Visit forms</a></li>
                <li><a class="dropdown-item" href="{{route('show_student_progress',['user_id' => $user->id,'student_id' => $student->id])}}">Progress</a></li>
                <li><a class="dropdown-item" href="{{route('show_student_Evaluation',['user_id' => $user->id,'student_id' => $student->id])}}">Evaluation</a></li>
                <li><a class="dropdown-item" href="">Company evaluation</a></li>
                <li><a class="dropdown-item" href="">Assessment</a></li>
            </ul>
            </td>
            </tr>        
            @endforeach

        </tbody>
        </table>
    </div>
</div>
@endsection