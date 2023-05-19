@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity3')
    active
@endsection
@section('trainees_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection
@section('content')
<div class="px-5 mb-2">
    {{-- filters --}}
    <div class="d-flex justify-content-end pe-3">
        <div class="d-flex mt-5 col-md-6" >
            <select class="form-select" name="tarining" aria-label="Training">
                <option selected>Training</option>
                <option value="1">name&depart</option>
            </select>
        </div>
    </div>
    <div class="d-flex flex-lg-row flex-column mt-3">
        {{-- Unengaged Trainees table --}}
        <div class="table-responsive flex-grow-1 me-3">
            <table class="table table-sm border table-hover">
                <thead class="bg-mid-sand">
                    <tr class="rounded-top">
                        <td colspan="2">
                            <label class="form-label mt-2 ms-3 fs-6">Unengaged Trainees:</label>
                        </td>
                        <td>
                            <button type="button" class="btn" 
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="add selected">
                                <i class="bi bi-plus-square fs-6"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" class="ps-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Add</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                @foreach ($unengaged_students as $unengaged_student)
                        <tr>
                            <td class="ps-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </td>                
                            <td>{{$unengaged_student['first_name_en'].' '. $unengaged_student['last_name_en']}}</td>
                            <td>
                            <a type="submit" class="btn" name="assign_training"
                            onClick="confirm('Are you sure?')"
                            href="{{ route('hr_assign_training', ['company_id' => $company_id, 'student_id' => $unengaged_student->id]) }}">
                            <i class="bi bi-plus-square fs-6"></i>
                            </a>

                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
        {{-- engaged Trainees table --}}
        <div class="table-responsive flex-grow-1 me-3">
            <table class="table table-sm border table-hover">
                <thead class="bg-mid-sand">
                    <tr class="rounded-top">
                        <td colspan="2">
                            <label class="form-label mt-2 ms-3 fs-6">Engaged Trainees: </label>
                        </td>
                        <td>
                            <button type="button" class="btn" 
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="delete selected">
                                <i class="bi bi-trash3 fs-6 text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" class="ps-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        </th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th> 
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach ($engaged_students as $engaged_student)
                        <tr>
                            <td class="ps-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </td>                
                            <td>{{$engaged_student['first_name_en'].' '. $engaged_student['last_name_en']}}</td>
                            <td>
                                <button type="button" class="btn">
                                    <i class="bi bi-trash3 fs-6 text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection