@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity2')
    active
@endsection
@section('trainees_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-sm-row flex-column mt-5 pb-3">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Specialization">
            <option selected>Specialization</option>
            <option value="1">registered</option>
            <option value="0">not-registered</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="GPA">
            <option selected>GPA</option>
            <option value="CS">4</option>
            <option value="MMT">> 3.67</option>
            <option value="GIS">> 3.5</option>
            <option value="CSE">> 3</option>
            <option value="CSE">> 2.5</option>
            <option value="CSE">> 2</option>
            <option value="CSE">< 2</option>

        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Load">
            <option selected>Load</option>
            <option value="CS">only Internship</option>
            <option value="CS">< 10</option>
            <option value="CS">10-13</option>
            <option value="CS">13-16</option>
            <option value="CS">> 16</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Availability_time">
            <option selected>Availability time</option>
            <option value="CS">CS</option>
        </select>
    
        <button type="button" class="btn bg-mid-sand p-0 mb-2 me-2"
        data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-title="Add selected"><i class="bi bi-plus-square fs-4 my-0"></i></i></button>
    </div>
        
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" value="" id="checkAll"></th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">GPA</th>
            <th scope="col">Load</th>
            <th scope="col">Availability time</th>
            <th scope="col">Add</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($students as $student)
            <tr>
            <td class="ps-3"><input class="table-checkbox form-check-input" type="checkbox" value="" id="flexCheckDefault"></td>                
            <td>{{$student['first_name_en'].' '. $student['last_name_en']}}</td>
            <td>{{$student->specialization->name}}</td>
            <td>{{$student['gpa']}}</td>
            <td>{{$student['load']}}</td>
            <td>{{$student['availability_date']}}</td>
            <td>
                <a type="submit" class="btn" name="add_trainee"
                onClick="confirm('Are you sure that you want to add this student as a trainee?')"
                href="{{ route('hr_add_trainee', ['company_id' => $company_id, 'student_id' => $student->id]) }}">
                    <i class="bi bi-plus-square fs-6"></i>
                </a>
            </td>
            </tr>
            @endforeach
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