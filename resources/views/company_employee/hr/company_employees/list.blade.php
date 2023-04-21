@extends('university_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('employees_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex justify-content-between flex-sm-row flex-column mt-5">
        <div class="d-flex flex-row col-sm-7">
            <select class="form-select border-gray me-2 mb-2 txt-sm w-25" aria-label="Supervisor">
                <option selected>Role</option>
                <option value="HR">HR</option>
                <option value="Trainer">Trainer</option>
                <option value="Both">Both</option>
            </select>
            <select class="form-select border-gray me-2 mb-2 txt-sm w-25" aria-label="Company">
                <option selected>Branch</option>
                <option value="CS">CS</option>
            </select>
            <select class="form-select border-gray me-2 mb-2 txt-sm w-25" aria-label="Company">
                <option selected>Department</option>
                <option value="CS">CS</option>
            </select>
            <form class="input-group mb-2 h-50 w-50" role="searprimarych">
            <input class="form-control txt-sm border border-secondary" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form> 
        </div>
        <a href="{{route('hr_add_Employee')}}"
        class="btn btn-sm btn-primary bg-dark-blue text-light opacity-75 px-3 w-auto h-50">
        Add Employee</a> 
    </div>
        
    {{-- Employees table--}}
    <div class="table-responsive mt-3">
        <table class="table txt-sm table-hover">
        <thead class="bg-mid-sand">
            <tr class="rounded-top">
                <td colspan="8"><label class="form-label mt-2 ms-3 fs-6">
                Employees</label>
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
            <th scope="col">Role</th>
            <th scope="col">Branch</th>
            <th scope="col">Department</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Trainees</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>****</td>
            <td>@mdo</td>
            <td>****</td>
            <td>****</td>
            <td>Otto</td>
            <td>@mdohhhhh</td>
            <td>
            <div class="d-flex">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h6 class="accordion-header">
                        <button class="accordion-button collapsed txt-sm p-1" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Trainees</button>
                        </h6>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body" style="max-height: 100px; overflow-y: auto;"><ul><li>hhhhhhhhhh</li><li>h</li><li>h</li><li>h</li></ul></div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn p-1 ms-1 h-auto"><i class="bi bi-box-arrow-up-right fs-6"></i></button>
            </div>
            </td>
            <td><button type="button" class="btn"><i class="bi bi-trash3 fs-6 text-danger"></i></button></td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection