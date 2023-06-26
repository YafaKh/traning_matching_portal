@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity3')
    active
@endsection
@section('sub_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection
@section('content')
<div class="px-5 mb-2">
    {{-- filters --}}
    <div class="d-flex justify-content-end  pe-3">
      <div class="d-flex flex-md-row flex-column mt-5 col-md-6" >
        <label class="form-label text-nowrap me-3">Choose a training to assign trainees to: </label>
        <form method="POST" action="{{ route('hr_assign_training', ['user_id'=>$user->id]) }}" id="assign_trainee_form">
        @csrf
            <select class="form-select" id="training-filter" name="training" aria-label="Training">
                <option value=''>Training</option>
                @foreach($trainings as $training)
                @if($training->active == 1)
                <option value="{{(int)$training['id']}}">{{$training['name']}}</option>
                @endif
                @endforeach
            </select>
            @error('training')
                <div class="alert alert-danger">
                    <strong>Error!</strong> {{ $message }}
                </div>
            @enderror
      </div>
    </div>
    <div class="d-flex flex-lg-row flex-column mt-3">
        {{-- Unengaged Trainees table --}}
        <div class="table-responsive flex-grow-1 me-3">
            <table class="table table-sm border table-hover" id="unengaged_trainees">
                <thead class="bg-mid-sand">
                    <tr class="rounded-top">
                        <td>
                            <label class="form-label mt-2 ms-3 fs-6">Unengaged Trainees:</label>
                        </td>
                        <td>
                            <button type="submit" class="btn" id="assign_training">
                            <i class="bi bi-plus-square fs-5"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" class="ps-3">
                        <input class="form-check-input" type="checkbox"  id="check-all1" onClick="check_all_check_boxes('check-all1', 'unengaged_trainees')">
                        </th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                @foreach ($unengaged_students as $unengaged_student)
                        <tr>
                            <td class="ps-3">
                            <input class="form-check-input" type="checkbox" value="{{ $unengaged_student['id'] }}" name="students[]" id="flexCheckDefault">
                            </td>                
                            <td>{{$unengaged_student['first_name_en'].' '. $unengaged_student['last_name_en']}}</td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
        </form>
        {{-- engaged Trainees table --}}
        <div class="table-responsive flex-grow-1 mx-3">
            <form id="delete-form" method="POST" action="{{ route('hr_unassign_training', ['user_id' => $user->id]) }}">
                @csrf
                <table class="table table-sm border table-hover" id="engaged_trainees">
                    <thead class="bg-mid-sand">
                        <tr class="rounded-top">
                            <td colspan="2">
                                <label class="form-label mt-2 ms-3 fs-6">Engaged Trainees: </label>
                            </td>
                            <td>
                                <button type="submit" class="btn" onclick="confirm('Are you certain that you want to remove the selected students from their training?')">
                                    <i class="bi bi-trash3 fs-5 text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col" class="ps-3">
                                <input class="form-check-input" type="checkbox" id="check-all2" onclick="checkAllCheckboxes('check-all2', 'engaged_trainees')">
                            </th>
                            <th scope="col">Name</th>
                            <th scope="col">Training</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        @foreach ($engaged_students as $engaged_student)
                            <tr>
                                <td class="ps-3">
                                    <input class="form-check-input student-checkbox" type="checkbox" name="student_ids[]" value="{{ $engaged_student['id'] }}">
                                </td>
                                <td>{{ $engaged_student['first_name_en'].' '. $engaged_student['last_name_en'] }}</td>
                                <td>{{ $engaged_student['training_name'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
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
    function checkAllCheckboxes(checkAllId, checkboxesTableId) {
        const checkAll = document.getElementById(checkAllId);
        const checkboxes = document.querySelectorAll(`#${checkboxesTableId} .student-checkbox`);
        
        checkboxes.forEach(checkbox => {
            checkbox.checked = checkAll.checked;
        });
    }
</script>
@endsection