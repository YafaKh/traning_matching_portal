@extends('coordinator.layout.master')
@section('navbar')
    @include('coordinator.layout.navbar')
@endsection
@section('companies_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex flex-row mt-5">
        <select class="form-select border-gray me-3 mb-2 txt-sm w-auto" aria-label="Supervisor">
            <option selected>Branch*</option>
            <option value="1">*****</option>
        </select>
        <form class="input-group mb-2 h-50 w-25" role="searprimarych">
            <input class="form-control txt-sm border-gray" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form>
    </div>
        
    {{-- supervisors table--}}
    <div class="table-responsive mt-4">
        <table class="table txt-sm  table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3" >ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Branches</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>****</td>
            <td>Otto</td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection