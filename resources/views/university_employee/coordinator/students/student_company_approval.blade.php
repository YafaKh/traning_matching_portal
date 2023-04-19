@extends('coordinator.layout.master')
@section('navbar')
    @include('coordinator.layout.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity2')
    active
@endsection
@section('student_navbar')
    @include('coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
        
    {{-- students table --}}
    <div class="table-responsive mt-5 d-flex justify-content-center ">
        <table class="table txt-sm border table-hover w-75">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3" >Name</th>
            <th scope="col">Companies</th>
            <th scope="col">Approve</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            <tr>
            <td class="ps-3" >****</td>
            <td>
                <ul>

                </ul>
            </td>
            <td><button type="button" class="btn h-50 btn-sm txt-sm btn-primary bg-dark-blue text-light opacity-75 ms-2"><i class="bi bi-check-square"></i></button></td>
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