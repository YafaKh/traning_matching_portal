@extends('all_users.master')
@section('navbar')
    @if($user->university_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
    @include('university_employee.coordinator.navbar')
    @endif
@endsection
@section('students_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class= "d-flex flex-md-row w-auto flex-column mt-5 pb-3">
        <div class= "d-flex flex-row">
        <select class="form-select w-auto me-2 mb-2 txt-sm" id="specialization" name="specialization">
        <option selected>Specialization</option>
        @foreach($specializations as $specialization)
            <option value="{{$specialization->id}}">{{$specialization->acronyms}}</option>
            @endforeach
        </select>
     
        </div>
        <form class="input-group h-50 w-auto" role="searprimarych" type="get" action="{{route('search',['user_id' => $user->id])}}">
            <input class="form-control txt-sm h-50 border border-secondary" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
        </form>
    </div>
    {{-- students table --}}
    <div class="table-responsive ">
        <table class="table txt-sm border table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">ID</th>
            <th scope="col" >Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            <th scope="col">Branch</th>
            <th scope="col">Training</th>
            <th scope="col">Go to student's</th>
            </tr>
          
        </thead>
        <tbody class="bg-light" id="studentList">
        @if(count($allStudents) > 0)

        @foreach($allStudents as $student)

            <tr>
            <td class="ps-3">{{$student ->student_num}}</td>
            <td><a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('supervisor_student_profile', ['user_id'=>$user->id, 'student_id'=> $student->id ]) }}">
                {{$student ->first_name_en}} {{$student ->second_name_en}} {{$student ->third_name_en}} {{$student ->last_name_en}}</a>
            </td>
            <td>{{$student ->specialization->acronyms}}</td>
            <td>{{$student ->training->branch->company->name ?? "__"}}</td>
            <td>{{$student ->training->branch->address ?? "__"}}</td>

            @if($student ->training->semester ?? "__" == "1")
            <td>Fall - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '2')
            <td>Spring - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '3')
            <td>First Summer - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == '4')
            <td>Second Summer - {{$student ->training->year}} - {{$student ->training->employee->first_name ?? "__"}} {{$student ->training->employee->last_name ?? "__"}}</td>
            @elseif($student ->training->semester ?? "__" == "__")
            <td>__</td>
            @endif
            <td>
            <a class="dropdown-toggle text-dark" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student's</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('student_visits',['user_id' => $user->id, 'student_id' => $student->id])}}">Visit forms</a></li>
                <li><a class="dropdown-item" href="{{route('supervisor_student_progress',['user_id' => $user->id,'student_id' => $student->id])}}">Progress</a></li>
                <li><a class="dropdown-item" href="{{route('show_student_Evaluation',['user_id' => $user->id,'student_id' => $student->id])}}">Evaluation</a></li>
                <li><a class="dropdown-item" href="{{route('show_company_Evaluation',['user_id' => $user->id,'student_id' => $student->id])}}">Company evaluation</a></li>
            </ul>
            </td>
            </tr>        
            @endforeach
        @endif
        </tbody>
        </table>
    </div>
    {{$allStudents->links()}}
    <a class="btn btn-secondary" href="{{route('supervisor_list_students',['user_id' => $user->id])}}">Back</a>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Add change event listener to the dropdown
    $('#specialization').on('change', function() {
      var selectedSpecialization = $(this).val(); // Get the selected value
      // var user_id = {!! json_encode($user->id) !!};
      // var user_id = {{ $user->id }};
      // Send AJAX request to fetch filtered students
    //   console.log(specialization);
      $.ajax({
        url: '{{route('filtered_students',['user_id' => $user->id])}}', // Replace with the endpoint URL to fetch filtered students
        type: 'GET',
        data: { specialization: selectedSpecialization },
        success: function(data) {
          // Update the student list with the filtered results
        //   $('#studentList').html(response);
        var students = data.students;
        console.log(data);

        var html ='';
        if(students.length > 0){
            for(let i=0;i<students.length;i++){
              var profileUrl ="{{ route('supervisor_student_profile', ['user_id' => ':user_id', 'student_id' => ':student_id']) }}";
              profileUrl = profileUrl.replace(':user_id', students[i]['university_employee_id'])
                       .replace(':student_id', students[i]['id']);
              var visitsUrl = "{{ route('student_visits', ['user_id' =>':user_id', 'student_id'=> ':student_id' ] ) }}";
              visitsUrl = visitsUrl.replace(':user_id', students[i]['university_employee_id'])
                       .replace(':student_id', students[i]['id']);
              var progressUrl = "{{ route('supervisor_student_progress', ['user_id' =>':user_id', 'student_id'=> ':student_id' ] ) }}";
              progressUrl = progressUrl.replace(':user_id', students[i]['university_employee_id'])
                       .replace(':student_id', students[i]['id']);
              var studentEvaluationUrl = "{{ route('show_student_Evaluation', ['user_id' =>':user_id', 'student_id'=> ':student_id' ] ) }}";
              studentEvaluationUrl = studentEvaluationUrl.replace(':user_id', students[i]['university_employee_id'])
                       .replace(':student_id', students[i]['id']);
              var companyEvaluationUrl = "{{ route('show_company_Evaluation', ['user_id' =>':user_id', 'student_id'=> ':student_id' ] ) }}";
              companyEvaluationUrl = companyEvaluationUrl.replace(':user_id', students[i]['university_employee_id'])
                       .replace(':student_id', students[i]['id']);
              html +='<tr>\
                        <td>'+students[i]['student_num']+'</td>\
                        <td><a class="link-dark link-underline-opacity-0 fw-bold" href="' + profileUrl + '">' + students[i]['first_name_en'] + ' ' + students[i]['second_name_en'] + ' ' + students[i]['third_name_en'] + ' ' + students[i]['last_name_en'] + '</a></td>\
                        <td>' + students[i]['specialization_acronyms'] + '</td>\
                        <td>' + students[i]['company_name'] + '</td>\
                        <td>' + students[i]['branch_name'] + '</td>\
                        <td>' + students[i]['training_semester'] +'-'+ students[i]['training_year'] +'-'+ students[i]['trainer_first_name'] +'-'+ students[i]['trainer_last_name'] + '</td>\
                        <td>\
                          <div class="dropdown">\
                            <a class="dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student\'s</a>\
                            <ul class="dropdown-menu">\
                              <li><a class="dropdown-item" href="' + visitsUrl + '">Visit forms</a></li>\
                              <li><a class="dropdown-item" href="'+ progressUrl +'">Progress</a></li>\
                              <li><a class="dropdown-item" href="'+ studentEvaluationUrl +'">Evaluation</a></li>\
                              <li><a class="dropdown-item" href="' + companyEvaluationUrl +'">Company evaluation</a></li>\
                            </ul>\
                          </div>\
                        </td>\
                      </tr>';
            }
        }
        else{
            html +='<tr>\
                    <td>No Data Found</td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    <td></td>\
                    </tr>';
        }//else
        $("#studentList").html(html);
    },
       
      });
    });
  });
  
</script>

@endsection