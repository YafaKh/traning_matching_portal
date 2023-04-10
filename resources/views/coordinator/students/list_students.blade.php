@extends('coordinator.layout.navbar')
@section('activity1')
    active
@endsection
@section('student_navbar')
    @include('coordinator.students.student_navbar')
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
    </div>
    <label class="txt-xsm pb-1">Note: students whose names are highlighted in red are not registered for the internship on the portal.</label>
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">ID</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            <th scope="col">Go to student's</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
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
            <td><i class="bi bi-trash3 ps-3 fs-6 text-danger"></i></td>
            </tr>
            <tr>
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
            <td><i class="bi bi-trash3 ps-3 fs-6"></i></td>
            </tr>
            <tr>
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
            <td><i class="bi bi-trash3 ps-3 fs-6"></i></td>
            </tr>
        </tbody>
        </table>
    </div>
    <button type="button" class="btn bg-dark-blue text-light opacity-75 shadow fw-medium bold px-5 mt-5 position-absolute start-50 translate-middle ">Report</button>
</div>
@endsection