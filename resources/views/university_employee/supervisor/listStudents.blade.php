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
        @if(count($specializations) > 0)
        @foreach($specializations as $specialization)
            <option value="{{$specialization->id}}">{{$specialization->acronyms}}</option>
            @endforeach
            @endif
        </select>

        <select class="form-select w-auto me-2 mb-2 txt-sm" aria-label="Company">
        <option selected>Company</option>
        @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
        @endforeach
        </select>
        </div>
        <div class= "d-flex flex-row w-auto">
        <select class="form-select w-auto me-2 mb-2 txt-sm" aria-label="Branch">
        <option selected>Branch</option>
        @foreach($branches as $branch)
            <option value="{{$branch->id}}">{{$branch->address}}</option>
        @endforeach
        </select>
        
        <select class="form-select w-auto me-2 mb-2 txt-sm " aria-label="Supervisor">

            <option selected>Training</option>
            @foreach($trainings as $training)

                @if($training->semester == "1")
                <option value="{{$training->id}}">Fall - {{$training->year ?? "__"}} - {{$training->employee->first_name ?? "__"}} {{$training->employee->last_name ?? "__"}}</option>
                @elseif($training->semester == '2')
                <option value="{{$training->id}}">Spring - {{$training->year ?? "__"}} - {{$training->employee->first_name ?? "__"}} {{$training->employee->last_name ?? "__"}}</option>
                @elseif($training->semester == '3')
                <option value="{{$training->id}}">First Summer - {{$training->year ?? "__"}} - {{$training->employee->first_name ?? "__"}} {{$training->employee->last_name ?? "__"}}</option>
                @elseif($training->semester == '4')
                <option value="{{$training->id}}">Second Summer - {{$training->year ?? "__"}} - {{$training->employee->first_name ?? "__"}} {{$training->employee->last_name ?? "__"}}</option>
                @endif
            @endforeach
        </select>
        </div>
        <form class="input-group h-50 w-auto" role="searprimarych">
            <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search" aria-label="Search">
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

</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    // Add change event listener to the dropdown
    $('#specialization').on('change', function() {
      var selectedSpecialization = $(this).val(); // Get the selected value
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
        console.log(data.students);

        var html ='';
        if(students.length > 0){
            for(let i=0;i<students.length;i++){
                html +='<tr>\
                        <td>'+students[i]['student_num']+'</td>\
                        <td><a class="link-dark link-underline-opacity-0 fw-bold" href="{{ route('supervisor_student_profile', ['user_id' => $user->id,'student_id' =>$student->id ] ) }}">' + students[i]['first_name_en'] + ' ' + students[i]['second_name_en'] + ' ' + students[i]['third_name_en'] + ' ' + students[i]['last_name_en'] + '</a></td>\
                        <td>' + students[i]['specialization_acronyms'] + '</td>\
                        <td>' + students[i]['company_name'] + '</td>\
                        <td>' + students[i]['branch_name'] + '</td>\
                        <td>' + students[i]['training_semester'] +'-'+ students[i]['training_year'] +'-'+ students[i]['trainer_first_name'] +'-'+ students[i]['trainer_last_name'] + '</td>\
                        <td>\
                          <div class="dropdown">\
                            <a class="dropdown-toggle text-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false">Go to student\'s</a>\
                            <ul class="dropdown-menu">\
                              <li><a class="dropdown-item" href="{{ route('student_visits', ['user_id' => $user->id, 'student_id' => "' + students[i]['id'] + '" ]) }}">Visit forms</a></li>\
                              <li><a class="dropdown-item" href="{{ route('supervisor_student_progress', ['user_id' => $user->id, 'student_id' => "' + students[i]['id'] + '" ]) }}">Progress</a></li>\
                              <li><a class="dropdown-item" href="{{ route('show_student_Evaluation', ['user_id' => $user->id, 'student_id' => "' + students[i]['id'] + '" ]) }}">Evaluation</a></li>\
                              <li><a class="dropdown-item" href="{{ route('show_company_Evaluation', ['user_id' => $user->id, 'student_id' => "' + students[i]['id'] + '" ]) }}">Company evaluation</a></li>\
                            </ul>\
                          </div>\
                        </td>\
                      </tr>';
            }
        }
        else{
            html +='<tr>\
                    <td>No Data Found</td>\
                    </tr>';
        }//else
        $("#studentList").html(html);
    },
       
      });
    });
  });
</script>

@endsection