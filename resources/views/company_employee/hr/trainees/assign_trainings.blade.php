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
    <div class="d-flex justify-content-end  pe-3">
        <div class="d-flex flex-md-row flex-column mt-5 col-md-6" >
        <label class="form-label text-nowrap me-3">Choose a training to assign trainees to: </label>
        <form method="POST" action="{{ route('hr_assign_training', ['company_id' => $company_id, 'student_id' => ':student_id']) }}" id="assign_trainee_form">
        @csrf
            <select class="form-select" id="training-filter" name="training" aria-label="Training">
                <option value=''>Training</option>
                @foreach($trainings as $training)
                <option value="{{(int)$training['id']}}">{{$training['name']}}</option>
                @endforeach
            </select>
            @error('training')
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $message }}
                </div>
            @enderror
        </form>
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
                            <button type="button" class="btn" name="assign_training"
                            onclick="assign_training('{{ $unengaged_student->id}}')">
                            <i class="bi bi-plus-square fs-6"></i>
                            </button>

                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>

        {{-- engaged Trainees table --}}
        <div class="table-responsive flex-grow-1 me-3">
            <table class="table table-sm border table-hover" id="engaged_trainees">
                <thead class="bg-mid-sand">
                    <tr class="rounded-top">
                        <td colspan="3">
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
                        <th scope="col">Training</th>
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
                            <td>{{$engaged_student['training_name']}}</td>
                            <td>
                                <a type="submit" class="btn"
                                href="{{ route('hr_unassign_training', ['company_id' => $company_id, 'student_id' => $engaged_student->id]) }}"
                                onClick="return confirm('Are you certain that you want to remove this student from their training?')">
                                <i class="bi bi-trash3 fs-6 text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Event listener for filter change
        $('#training-filter').change(filterTable);

        function filterTable() {
            var training_filter = $('#training-filter option:selected').text();

            // Loop through each row in the table
            $('#engaged_trainees tbody tr').each(function() {
                var row = $(this);
                var training = row.find('td:eq(2)').text();

                // Show/hide rows based on filter criteria
                if (training === training_filter || training_filter === 'Training') {
                    row.show();
                } else {
                    row.hide();
                }
            });
        }
    });

    function assign_training(student_id) {
        var form = document.getElementById('assign_trainee_form');
        form.action = form.action.replace(':student_id', student_id);
        if (confirm('Are you sure?')) {
        form.submit();
        }
    }
</script>
@endsection