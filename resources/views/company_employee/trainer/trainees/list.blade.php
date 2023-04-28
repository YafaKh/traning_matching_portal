@extends('university_employee.master')
@section('navbar')
    @include('company_employee.trainer.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('content')
<div class="px-5">
    <div class="col-md-4 mx-auto">
    <form class="input-group mt-5 mb-3 w-auto" role="searprimarych">
        <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search by student name" aria-label="Search">
        <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
        <i class="bi bi-search txt-xsm"></i>
        </button>
    </form></div>
    {{-- students table --}}
    <div class="table-responsive col-lg-9 mx-auto">
        <table class="table txt-sm table-sm border table-hover shadow">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">Ttaning</th>
            <th scope="col">Progress</th>
            <th scope="col">Evaluation</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
            <td>@mdo</td>
            <td><button type="button" class="btn"><i class="bi bi-box-arrow-up-right"></i></button></td>
            <td><button type="button" class="btn"><i class="bi bi-box-arrow-up-right"></i></button></td>
            </tr>
        </tbody>
        </table>
    </div>

</div>
@endsection