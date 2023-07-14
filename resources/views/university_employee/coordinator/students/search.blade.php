@extends('all_users.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('students_activity')
    active
@endsection
@section('activity1')
    active
@endsection
@section('sub_navbar')
    @include('university_employee.coordinator.students.student_navbar')
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-sm-row flex-column mt-5 pb-3">
        <select class="form-select flex-grow-1 me-2 mb-2 txt-sm" id="registration_state" aria-label="Registration_state">
            <option selected>Registration state</option>
            <option value="1">registered</option>
            <option value="0">not-registered</option>
        </select>

        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="3">
            <option value="All">Specialization</option>
            @foreach($specializations as $specialization)
            <option value="{{$specialization['acronyms']}}">{{$specialization['acronyms']}}</option>
            @endforeach
        </select>

        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm" data-column="4">
            <option value="All">Company</option>
            <option value="-">Unengaged Sudents</option>
            @foreach($companies as $company)
                @foreach($company->branches as $branch)
                <option value="{{$company['name']}}-{{$branch->city->name}}">{{$company['name']}}-{{$branch->city->name}}</option>
                @endforeach
            @endforeach
        </select>
        
        <select class="filter-dropdown form-select flex-grow-1 me-2 mb-2 txt-sm " data-column="5">
            <option value="All">Supervisor</option>
            @foreach($supervisors as $supervisor)
            <option value="{{ $supervisor['first_name']}} {{ $supervisor['last_name']}}">
            {{ $supervisor['first_name']}} {{ $supervisor['last_name']}}
            </option>
            @endforeach
        </select>
        <a class="btn btn-light h-75 py-0 px-1" id="del-selected-btn" href="javascript:void(0);">
        <i class="bi bi-trash3 fs-5 text-danger"></i>
        </a>
    </div>
    {{--Upload registered students list--}}
    <div class="d-flex flex-sm-row flex-column justify-content-between mb-2">
        <label class="txt-xsm pb-1 h-50 mt-auto">Note: students whose names are highlighted in red are not registered for the internship on the portal.</label>
        <form action="{{route('update_register_list', ['user_id'=>$user->id])}}"  method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-1">
                <label for="formFileSm" class="form-label txt-sm">Upload registered students IDs list (.txt), ID per line.</label>
                <div class="d-flex flex-row">
                    <input class="form-control form-control-sm w-auto me-2" id="formFileSm" name="register_list" type="file">
                    <button type="submit" class="btn btn-primary bg-dark-blue btn-sm text-light opacity-75 h-50 px-3"
                        data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Update registration state">Update
                    </button>
                </div>
            </div>
            @error('register_list') 
            <div class="alert alert-danger">
                <strong>Error!</strong> {{ $message }}
            </div>
            @enderror
        </form>
    </div>
        
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm table-sm border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">
  <input class="form-check-input" type="checkbox" id="check-all1" onClick="check_all_check_boxes('check-all1', 'table')">
</th>
            <th scope="col">University ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Supervisor</th>
            <th scope="col">Go to student's</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach($students as $student)
            <tr>
            <td class="ps-3">
            <input class="table-checkbox form-check-input" type="checkbox" name="selected_students[]" value="{{ $student->id }}">
            </td>
            <td>{{$student['student_num']}}</td>
            <td class="registration-state-cell" data-registered="{{$student['registered']}}">
                @if($student['registered'])
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                {{$student['first_name_en']}} {{$student['last_name_en']}}
                </a>
                @else
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('coordinator_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                <span class="text-danger">{{$student['first_name_en']}} {{$student['last_name_en']}}</span>
                </a>
                @endif
            </td>
            <td>{{$student->specialization->acronyms}}</td>
            <td>{{$student->training->branch->company->name ?? ''}}-{{$student->training->branch->city->name ?? ''}}</td>
            <td>{{$student->supervisor['first_name'] ?? ''}} {{$student->supervisor['last_name'] ?? ''}}</td>
            <td>
            <a class="dropdown-toggle text-dark" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student's</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('coordinator_student_progress',['user_id' => $user->id,'student_id' => $student->id])}}">Progress</a></li>
                <li><a class="dropdown-item" href="{{route('student_visits',['user_id' => $user->id, 'student_id' => $student->id])}}">Visit forms</a></li>
                <li><a class="dropdown-item" href="{{route('coordinator_student_Evaluation',['user_id' => $user->id,'student_id' => $student->id])}}">Evaluation</a></li>
                <li><a class="dropdown-item" href="{{route('coordinator_company_Evaluation',['user_id' => $user->id,'student_id' => $student->id])}}">Company evaluation</a></li>
             </ul>
            </td>
            <td>
                <a class="btn"
                href="{{ route('coordinator_delete_student', ['student_id' => $student->id, 'user_id'=>$user->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <a class="btn btn-secondary" href="{{route('coordinator_list_students',['user_id' => $user->id])}}">Back</a>

</div>
<script>
    function deleteSelectedStudents() {
        // Get all the selected checkboxes
        var checkboxes = document.querySelectorAll('input[name="selected_students[]"]:checked');
        var studentIds = [];

        // Collect the IDs of the selected students
        checkboxes.forEach(function(checkbox) {
            studentIds.push(checkbox.value);
        });

        // Confirm the action with the user
        var confirmation = confirm('Are you sure that you want to delete selecteds?');
        if (confirmation) {
            // Redirect to the server-side route with the selected student IDs
            var url = '{{ route('delete_selected_students', ['user_id' => $user->id]) }}';
            window.location.href = url + '?student_ids=' + studentIds.join(',');
        }
    }

    // Attach the click event handler to the "Add Selected" button
    var delSelectedBtn = document.getElementById('del-selected-btn');
    delSelectedBtn.addEventListener('click', deleteSelectedStudents);
</script>
<script>
  // get students according to their registration state
  $(document).ready(function() {
    // Add change event listener to the dropdown
    $('#registration_state').on('change', function() {
      var registration_state = $(this).val(); // Get the selected value
      // Send AJAX request to fetch filtered students
    //   console.log(registration_state);
      $.ajax({
        url: '{{ route('filtered_students.coordinator', ['user_id' => $user->id]) }}',
        type: 'GET',
        data: { registration_state: registration_state },
        success: function(data) {
          // Update the student list with the filtered results
          var students = data.students;
          console.log(students);
          var html = '';
          if (students.length > 0) {
            for (let i = 0; i < students.length; i++) {
                var profileUrl = "{{ route('student_visits', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              ProfileUrl = ProfileUrl.replace(':user_id', students[i]['university_employee_id'])
                .replace(':student_id', students[i]['id']);
              var visitsUrl = "{{ route('student_visits', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              visitsUrl = visitsUrl.replace(':user_id', students[i]['university_employee_id'])
                .replace(':student_id', students[i]['id']);
              var progressUrl = "{{ route('coordinator_student_progress', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              progressUrl = progressUrl.replace(':user_id', students[i]['university_employee_id'])
                .replace(':student_id', students[i]['id']);
              var studentEvaluationUrl = "{{ route('coordinator_student_Evaluation', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              studentEvaluationUrl = studentEvaluationUrl.replace(':user_id', students[i]['university_employee_id'])
                .replace(':student_id', students[i]['id']);
              var companyEvaluationUrl = "{{ route('coordinator_company_Evaluation', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              companyEvaluationUrl = companyEvaluationUrl.replace(':user_id', students[i]['university_employee_id'])
                .replace(':student_id', students[i]['id']);
              html += '<tr>\
                        <td>' + students[i]['student_num'] + '</td>\
                        <td><a class="dropdown-item" href="' + profileUrl + '">' + students[i]['first_name_en'] + ' ' + students[i]['last_name_en'] + '</a></td>\
                        <td>' + students[i]['company_name'] + '-' + students[i]['branch_name'] + '</td>\
                        <td>' + students[i]['university_employee_name'] + '</td>\
                        <td>\
                          <div class="dropdown">\
                            <a class="dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student\'s</a>\
                            <ul class="dropdown-menu">\
                              <li><a class="dropdown-item" href="' + visitsUrl + '">Visit forms</a></li>\
                              <li><a class="dropdown-item" href="' + progressUrl + '">Progress</a></li>\
                              <li><a class="dropdown-item" href="' + studentEvaluationUrl + '">Evaluation</a></li>\
                              <li><a class="dropdown-item" href="' + companyEvaluationUrl + '">Company evaluation</a></li>\
                            </ul>\
                          </div>\
                        </td>\
                      </tr>';
            }
          } else {
            html += '<tr>\
                    <td>No Data Found</td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                  </tr>';
          }
          $("#studentList").html(html);
        },
      });
    });
  });
</script>


@endsection