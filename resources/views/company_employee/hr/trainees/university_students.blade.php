@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('activity2')
    active
@endsection
@section('sub_navbar')
    @include('company_employee.hr.trainees.trainees_navbar')
@endsection
@section('content')
<div class="px-5">
{{--filters--}}
    <div class="d-flex flex-sm-row flex-column mt-5 pb-3">
        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="2">
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
        <a class="btn bg-mid-sand p-0 mb-2 me-2" name="add_selected" id="add-selected-btn" href="javascript:void(0);">
       <i class="bi bi-plus-square fs-4 my-0"></i>
        </a>
    </div>

            
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3"><input class="form-check-input" type="checkbox" id="check-all1" onClick="check_all_check_boxes('check-all1', 'table')"></th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">GPA</th>
            <th scope="col">Load</th>
            <th scope="col">Availability time</th>
            <th scope="col">Add</th>
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach ($students as $student)
            <tr>
            <td class="ps-3"><input class="table-checkbox form-check-input" type="checkbox" id="flexCheckDefault" name="selected_students[]" value="{{ $student->id }}"></td>                
            <td> 
              <a class="link-dark link-underline-opacity-0 fw-bold" 
              href="{{ route('hr_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
             {{$student['first_name_en'].' '. $student['last_name_en']}}
            </a></td>
            <td>{{$student->specialization->name}}</td>
            <td>{{$student['gpa']}}</td>
            <td>{{$student['load']}}</td>
            <td>{{$student['availability_date']}}</td>
            <td>
            <a class="btn"
                href="{{ route('hr_add_trainee', ['user_id'=>$user->id, 'student_id' => $student->id]) }}"
                onClick="return confirm('Are you sure that you want to add this student as a trainee?')">
                <i class="bi bi-plus-square fs-6"></i>
            </a>  
            </td>
            </tr>
            @endforeach
        </tbody>
        </table> 
        {{$students->links()}}
   
    </div>
</div>
<script>
    function addSelectedStudents() {
        // Get all the selected checkboxes
        var checkboxes = document.querySelectorAll('input[name="selected_students[]"]:checked');
        var studentIds = [];

        // Collect the IDs of the selected students
        checkboxes.forEach(function(checkbox) {
            studentIds.push(checkbox.value);
        });

        // Confirm the action with the user
        var confirmation = confirm('Are you sure that you want to add selected students to your company?');
        if (confirmation) {
            // Redirect to the server-side route with the selected student IDs
            var url = '{{ route('hr_add_selected_trainees', ['user_id' => $user->id]) }}';
            window.location.href = url + '?student_ids=' + studentIds.join(',');
        }
    }

    // Attach the click event handler to the "Add Selected" button
    var addSelectedBtn = document.getElementById('add-selected-btn');
    addSelectedBtn.addEventListener('click', addSelectedStudents);
</script>

<script>
// Add event listeners to the special filters
document.getElementById('gpa-filter').addEventListener('change', customFilter);
document.getElementById('load-filter').addEventListener('change', customFilter);

function customFilter() {
  var gpaFilter = document.getElementById('gpa-filter').value;
  var loadFilter = document.getElementById('load-filter').value;

  // Loop through each row in the table
  var tableRows = document.querySelectorAll('#table tbody tr');
  tableRows.forEach(function(row) {
    var gpa = parseFloat(row.querySelector('td:nth-child(4)').textContent);
    var load = parseInt(row.querySelector('td:nth-child(5)').textContent);

    // Filter based on selected values
    var gpaMatch = gpaFilter === 'GPA' || !gpaFilter || checkGPAMatch(gpaFilter, gpa);
    var loadMatch = loadFilter === 'Load' || !loadFilter || checkLoadMatch(loadFilter, load);

    // Show/hide rows based on filter criteria
    if (gpaMatch && loadMatch) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
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
      return load === 0;
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

</script>

@endsection