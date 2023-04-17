@extends('coordinator.layout.master')
@section('navbar')
    @include('hr.layout.navbar')
@endsection

@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex flex-sm-row flex-column mt-5 col-lg-7">
        <select class="form-select flex-grow-1 me-sm-5 mb-2 txt-sm" aria-label="Supervisor">
            <option selected>Supervisor*</option>
            <option value="1">*****</option>
        </select>
        <label class="form-label txt-sm mt-2 me-1" style="white-space: nowrap;">supervisor name*</label>
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Company">
            <option selected>Company*</option>
            <option value="CS">CS</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch*</option>
            <option value="CS">CS</option>
        </select>  
        <button type="button" class="btn h-50 btn-sm btn-primary bg-dark-blue text-light opacity-75">Confirm</button>      
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
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
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
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
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