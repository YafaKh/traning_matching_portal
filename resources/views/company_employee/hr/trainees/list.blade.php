@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity1')
    active
@endsection
@section('trainees_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection 
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-row  mt-5 pb-3 col-lg-6">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Branch">
            <option selected>Branch</option>
            <option value="CS">CS</option>
        </select>

        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" aria-label="Department">
            <option selected>Department</option>
            <option value="CS">CS</option>
        </select>
        
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm " aria-label="Trainer">
            <option selected>Trainer</option>
            <option value="CS">CS</option>
        </select>
 </div>
        
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">Training</th>
            <th scope="col">Branch</th>
            <th scope="col">Trainer</th>
            <th scope="col">Progress</th>
            <th scope="col">Evaluation</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($students_data as $student)
            <tr> 
            <td class="ps-3"><a>{{$student['first_name_en'].' '. $student['last_name_en']}}</a></td>
            <td>{{$student['training_name']}}</td>
            <td>{{$student['training_branch']}}</</td>
            <td>{{$student['trainer_first_name'].' '.$student['trainer_last_name']}}<//td>
            <td><a type="button" class="btn" href="">
                <i class="bi bi-box-arrow-up-right"></i></a>
            </td>
            <td><a type="button" class="btn">
                <i class="bi bi-box-arrow-up-right"></i></a>
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

    <div class="table-responsive mt-5 col-md-6">
        <lable class="form-label ms-1 text-secondary fs-6">waiting for approval :</lable>
        <table class="table txt-sm table-sm border table-hover mt-2">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach($not_aaproved_students as $not_aaproved_student)
            <tr>
            <td class="ps-3">{{$not_aaproved_student->student['first_name_en'].' '.
                               $not_aaproved_student->student['last_name_en']}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

<script>
    // Get references to the select elements
const branchSelect = document.querySelector('select[data-filter="branch"]');
const departmentSelect = document.querySelector('select[data-filter="department"]');
const trainerSelect = document.querySelector('select[data-filter="trainer"]');

// Add event listener to branch select element
branchSelect.addEventListener('change', () => {
  // Get the selected branch value
  const selectedBranch = branchSelect.value;

  // Filter the department select options to only show those belonging to the selected branch
  // Code to update the options of the department select element based on the selected branch goes here
});

// Add event listener to all select elements
[branchSelect, departmentSelect, trainerSelect].forEach(select => {
  select.addEventListener('change', () => {
    // Get the selected filter values
    const selectedBranch = branchSelect.value;
    const selectedDepartment = departmentSelect.value;
    const selectedTrainer = trainerSelect.value;

    // Loop through the rows of the table and hide/show rows based on the selected filter values
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach(row => {
      const branch = row.querySelector('td:nth-child(2)').textContent;
      const department = row.querySelector('td:nth-child(3)').textContent;
      const trainer = row.querySelector('td:nth-child(4)').textContent;

      // Determine whether to show or hide the row based on the selected filter values
      const showRow = (selectedBranch === 'Branch' || branch === selectedBranch)
        && (selectedDepartment === 'Department' || department === selectedDepartment)
        && (selectedTrainer === 'Trainer' || trainer === selectedTrainer);

      row.style.display = showRow ? '' : 'none';
    });
  });
});
</script>
@endsection