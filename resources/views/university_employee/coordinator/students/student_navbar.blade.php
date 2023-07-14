<nav class="navbar navbar-expand-md bg-dark-blue  txt-sm">
  <div class="container-fluid px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        @if($user->university_employee_role_id==3)
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity')" aria-current="page" href="{{route('supervisor_list_students', ['user_id'=>$user->id])}}">My students</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity1')" aria-current="page" href="{{route('coordinator_list_students', ['user_id'=>$user->id])}}">List students</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity2')" aria-current="page" href="{{route('coordinator_students_companies_approval', ['user_id'=>$user->id])}}">Student-Company approval</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity3')" aria-current="page" href="{{route('coordinator_manage_supervisors', ['user_id'=>$user->id])}}"">Assign supervisors</a>
        </li>
      </ul>

      

    </div>
  </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
// to enable tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  // function search(user_id) {
  //   var search_text = document.getElementById('search_input').value;
  //   window.location.href = '{{ route('search.coordinator.students', ['user_id' => ':user_id']) }}'.replace(':user_id', user_id) + '?search=' + search_text;
  // }

  // get students according to their registration state
  $(document).ready(function() {
    // Add change event listener to the dropdown
    $('#registration_state').on('change', function() {
      var selectedRegistration_state = $(this).val(); // Get the selected value
      // Send AJAX request to fetch filtered students
    //   console.log(registration_state);
      $.ajax({
        url: '{{ route('filtered_students.coordinator', ['user_id' => $user->id]) }}',
        type: 'GET',
        data: { registration_state: selectedRegistration_state },
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