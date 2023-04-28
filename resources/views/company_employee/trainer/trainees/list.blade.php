@extends('university_employee.master')
@section('navbar')
    @include('company_employee.trainer.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-row  mt-5 pb-3 col-lg-6">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch</option>
            <option value="CS">CS</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Department">
            <option selected>Department</option>
            <option value="CS">CS</option>
        </select>
        
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm " aria-label="Trainer">
            <option selected>Trainer</option>
            <option value="CS">CS</option>
        </select>
 </div>
        
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">Branch</th>
            <th scope="col">Department</th>
            <th scope="col">Trainer</th>
            <th scope="col">Progress</th>
            <th scope="col">Evaluation</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td><button type="button" class="btn"><i class="bi bi-box-arrow-up-right"></i></button></td>
            <td><button type="button" class="btn"><i class="bi bi-box-arrow-up-right"></i></button></td>
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

    <div class="table-responsive mt-5 col-md-6">
        <lable class="form-label ms-1 text-secondary fs-6">waiting for approval :</lable>
        <table class="table txt-sm table-sm border table-hover mt-2">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection