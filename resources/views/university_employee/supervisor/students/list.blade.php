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
            <select class="form-select txt-sm w-auto" aria-label="Go_to">
                <option value="Progress" selected>Progress</option>
                <option value="Visit_forms">Visit forms</option>
                <option value="Evaluation">Evaluation</option>
                <option value="Assessment">Company evaluation</option>
                <option value="Assessment">Assessment</option>
            </select>
            </td>
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