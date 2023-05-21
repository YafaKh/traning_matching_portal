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
    <div class="d-flex flex-sm-row flex-column mt-5 pb-3">
        <select id="specialization-filter" class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Specialization">
            <option value="All">Specialization</option>
            @foreach($specializations as $specialization)
            <option value="{{$specialization['name']}}">{{$specialization['name']}}</option>
            @endforeach
        </select>

        <select id="gpa-filter" class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="GPA">
            <option value="All">GPA</option>
            <option value="4">4</option>
            <option value="3.67">> 3.67</option>
            <option value="3.5">> 3.5</option>
            <option value="3">> 3</option>
            <option value="2.5">> 2.5</option>
            <option value="2">> 2</option>
            <option value="1">< 2</option>
        </select>

        <select id="load-filter" class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Load">
            <option value="All">Load</option>
            <option value="0">only Internship</option>
            <option value="10">< 10</option>
            <option value="10-13">10-13</option>
            <option value="13-16">13-16</option>
            <option value="16">> 16</option>
        </select>

        <button type="button" class="btn bg-mid-sand p-0 mb-2 me-2"
                data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-title="Add selected"><i class="bi bi-plus-square fs-4 my-0"></i></button>
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
    {{$students->links()}}
</div>
{{-- jquery cdn --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Event listener for filter change
        $('#specialization-filter, #gpa-filter, #load-filter').change(filterTable);

        function filterTable() {
            var specializationFilter = $('#specialization-filter').val();
            var gpaFilter = $('#gpa-filter').val();
            var loadFilter = $('#load-filter').val();

            // Loop through each row in the table
            $('#table tbody tr').each(function() {
                var row = $(this);
                var specialization = row.find('td:eq(2)').text();
                var gpa = parseFloat(row.find('td:eq(3)').text());
                var load = parseInt(row.find('td:eq(4)').text());

                // Filter based on selected values
                var specializationMatch = specializationFilter === 'Specialization' || specializationFilter === "All" || specializationFilter === specialization;
                var gpaMatch = gpaFilter === 'GPA' || !gpaFilter || checkGPAMatch(gpaFilter, gpa);
                var loadMatch = loadFilter === 'Load' || !loadFilter || checkLoadMatch(loadFilter, load);

                // Show/hide rows based on filter criteria
                if (specializationMatch && gpaMatch && loadMatch) {
                    row.show();
                } else {
                    row.hide();
                }
            });
        }

        // Helper function to check GPA filter match
        function checkGPAMatch(filter, gpa) {
            switch (filter) {
                case 'All':
                    return true;
                case '4':
                    return gpa >= 4;
                case '3.67':
                    return gpa >= 3.67;
                case '3.5':
                    return gpa >= 3.5;
                case '3':
                    return gpa >= 3;
                case '2.5':
                    return gpa >= 2.5;
                case '2':
                    return gpa >= 2;
                case '1':
                    return gpa < 2;
                default:
                    return false;
            }
        }

        // Helper function to check Load filter match
        function checkLoadMatch(filter, load) {
            switch (filter) {
               case 'All':
                    return true;
                case '0':
                    return load == 0;
                case '10':
                    return load < 10;
                case '10-13':
                    return load >= 10 && load <= 13;
                case '13-16':
                    return load >= 13 && load <= 16;
                case '16':
                    return load > 16;
                default:
                    return false;
            }
        }
    });
</script>

@endsection