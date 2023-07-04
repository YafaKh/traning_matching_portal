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
    {{-- students table --}}
    <div class="table-responsive col-lg-7 mx-auto mt-5 shadow bg-light">
        <table class="table">
        <thead class="bg-dark-blue text-light">
            <tr>
              <td class="rounded-top py-4 ps-4 fs-6b">**student name (company)</td>
            </tr>
        </thead>
        <tbody class="bg-light" >
            <tr>
            <td class="ps-4"><a>date</a></td>
            </tr>
        </tbody>
        </table>
    </div>
</div>
<div class="text-center">
  <a href="{{route('fill_visit_form')}}"
   class="btn btn-secondary px-5 py-1 my-4 mx-auto shadow" 
   type="button">New</a>
</div>
@endsection