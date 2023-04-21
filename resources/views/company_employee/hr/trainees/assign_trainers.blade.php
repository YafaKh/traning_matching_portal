@extends('university_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity3')
    active
@endsection
@section('student_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection
@section('content')
<div class="px-5 mb-2">
    {{--filters--}}
    <div class="d-flex mt-5">
        <select class="form-select w-auto " aria-label="Trainer">
            <option selected>Trainer</option>
            <option value="1">*********</option>
        </select>
    </div>
        
    {{-- supervisor students table--}}
    <div class="table-responsive col-lg-10 mt-3">
        <table class="table txt-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr class="rounded-top">
                <td colspan="4"><label class="form-label mt-2 ms-3 fs-6">
                    supervisor name students*</label>
                </td>
                <td><button type="button" class="btn" 
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="delete selected"><i class="bi bi-trash3 fs-6 text-danger"></i>
                    </button>
                </td>
            </tr>
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>
            <th scope="col" >Name</th>
            <th scope="col">Branch</th>
            <th scope="col">Department</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
        </tbody>
        </table>
    </div>
    {{--other students table--}}
    <div class="table-responsive col-lg-10 mt-3">
        <table class="table txt-sm table-sm border table-hover">
        <thead class="bg-mid-sand">
        <tr class="rounded-top">
                <td colspan="4"><label class="form-label mt-2 ms-3 fs-6">
                    other students:</label>
                </td>
                <td><button type="button" class="btn" 
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="add selected"><i class="bi bi-plus-square fs-6"></i></button>                    </button>
                </td>
            </tr>
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></th>
            <th scope="col" >Name</th>
            <th scope="col">Branch</th>
            <th scope="col">Department</th>
            <th scope="col">Add</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-plus-square fs-6"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-plus-square fs-6"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-plus-square fs-6"></i></button></td>
            </tr>
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-plus-square fs-6"></i></button></td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection