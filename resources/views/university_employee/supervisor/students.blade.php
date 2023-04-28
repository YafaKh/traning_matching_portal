@extends('university_employee.master')
@section('navbar')
    @include('university_employee.supervisor.navbar')
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
        <table class="table txt-sm table-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
            <th scope="col">ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            <th scope="col">Training</th>
            <th scope="col">Go to student's</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>
            <a class="dropdown-toggle text-dark" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student's</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('student_visit_forms')}}">Visit forms</a></li>
                <li><a class="dropdown-item" href="">Progress</a></li>
                <li><a class="dropdown-item" href="">Evaluation</a></li>
                <li><a class="dropdown-item" href="">Company evaluation</a></li>
                <li><a class="dropdown-item" href="">Assessment</a></li>
            </ul>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection