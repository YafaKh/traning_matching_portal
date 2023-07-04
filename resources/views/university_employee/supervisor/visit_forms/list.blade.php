@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('visits_activity')
    active
@endsection
@section('content')
<div class="px-5">
    <p>could add filters</p>
    <div class="col-md-4 mx-auto">
    <form class="input-group my-4 w-auto" role="searprimarych">
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
            <th scope="col"  class="ps-3"><a>Date</a></th>
            <th scope="col" >Student Name</th>
            <th scope="col">Company</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3">****</td>
            <td>Otto</td>
            <td>@mdo</td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection