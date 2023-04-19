@extends('university_employee.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity1')
    active
@endsection
@section('student_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-sm-row flex-column mt-5 pb-3">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Registration_state">
            <option selected>Registration state</option>
            <option value="1">registered</option>
            <option value="0">not-registered</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Specialization">
            <option selected>Specialization*</option>
            <option value="CS">CS</option>
            <option value="MMT">MMT/option>
            <option value="GIS">GIS</option>
            <option value="CSE">CSE</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Company">
            <option selected>Company*</option>
            <option value="CS">CS</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch*</option>
            <option value="CS">CS</option>
        </select>
        
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm " aria-label="Supervisor">
            <option selected>Supervisor*</option>
            <option value="CS">CS</option>
        </select>
        {{--*submit/butoon--}}
        <button type="button" class="btn bg-mid-sand border mb-2 me-2"
        data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-title="delete selected"><i class="bi bi-trash3 py-0 fs-6 text-danger"></i></button>
        <button type="button" class="btn h-50 btn-primary bg-dark-blue text-light opacity-75 px-3">Report</button>
    </div>
    {{--Upload registered students list--}}
    <div class="d-flex flex-sm-row flex-column justify-content-between mb-2">
        <label class="txt-xsm pb-1 h-50 mt-auto">Note: students whose names are highlighted in red are not registered for the internship on the portal.</label>
        <div class="mb-1">
            <label for="formFileSm" class="form-label txt-sm">Upload registered students list (.xlsx)</label>
            <div class="d-flex flex-row">
                <input class="form-control form-control-sm w-auto me-2" id="formFileSm" type="file">
                <button type="button" class="btn btn-primary bg-dark-blue btn-sm text-light opacity-75 h-50 px-3"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Update registration state">Update
                </button>
            </div>
        </div>
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
            <th scope="col">Go to student's</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>
            <select class="form-select txt-sm w-auto" aria-label="Go_to">
                <option value="Progress" selected>Progress</option>
                <option value="Visit_forms">Visit forms</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Assessment">Company evaluation</option>
                <option value="Assessment">Assessment</option>
            </select>
            </td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>
            <select class="form-select txt-sm w-auto" aria-label="Go_to">
                <option value="Progress" selected>Progress</option>
                <option value="Visit_forms">Visit forms</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Assessment">Company evaluation</option>
                <option value="Assessment">Assessment</option>
            </select>
            </td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>
            <select class="form-select txt-sm w-auto" aria-label="Go_to">
                <option value="Progress" selected>Progress</option>
                <option value="Visit_forms">Visit forms</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Assessment">Company evaluation</option>
                <option value="Assessment">Assessment</option>
            </select>
            </td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
        </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-sm">
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>
</div>
@endsection