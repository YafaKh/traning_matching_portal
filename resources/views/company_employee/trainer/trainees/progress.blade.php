@extends('company_employee.master')
@section('navbar')
@include('company_employee.trainer.navbar')
@endsection

@section('content')
<form action="{{route('fill_traniee_progress.add', ['user_id' => $trainer->id,'trainee_id' => $trainee->id])}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="px-2">
<section>
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's progress</h2>
  </div>
  <div class=" col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
    <div class="d-flex flex-row ">
        <div class="me-5">
            <p>Trainee's Name</p>
            <p>{{$trainee->first_name_en}} {{$trainee->last_name_en}}</p><hr>
        </div>
        <div class="ms-5">
            <p>Training</p>
           @if($training->semester == "1")
            <p>Fall - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '2')
         <p>Spring - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '3')
         <p>First Summer - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
         @elseif($training->semester == '4')
         <p>Second Summer - {{$training->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</p><hr>
        @endif
        </div>
    </div>
   </div>
</section>
<!-- to add progress -->
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<!-- <div class="text-center d-flex col-md-5 mb-3"> -->
  <!-- <button type="button" class="btn btn-sm btn-primary bg-dark-blue px-4 me-2" onclick="addRow()">Add Row</button> -->
  <!-- <button type="button" class="btn btn-sm btn-danger" onclick="deleteRow()">Delete Last Row</button> -->
<!-- </div> -->
<div class="table-responsive ">
  <table class="table txt-sm table-sm border table-hover">
  <thead class="bg-mid-sand">
      <tr >
      <th scope="col">Week</th>
      <th scope="col">End Date</th>
      <th scope="col">Passed houers</th>
      <th scope="col">Absences days</th>
      <th scope="col">Notes</th>
      <th scope="col"></th>
      </tr>
  </thead>
  <tbody class="bg-light">
      <tr>
      <td><input type="text" name="week" id="week" placeholder="week1" class="w-50">
      <div class="row">
      @error('week')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </td>

      <td><input type = "date" name = "end_date">
      <div class="row">
        @error('end_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </td>
      
      <td><input type="number" id="passed_hours" name="passed_hours" min="0" max="40" value="20">
      <div class="row">
        @error('passed_hours')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
</td>
      <td><input type="number" id="absences_days" name="absences_days" min="0" max="5" value="0">
      <div class="row">
        @error('absences_days')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div></td>
      
      <td><textarea class="col-10" name="note"></textarea>
      <div class="note">
        @error('end_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div></td>
        
    </tr>

  </tbody>

  </table>
  </div>

<div class="text-center">
<a class="btn btn-secondary px-5 my-3 mx-auto" type="button" href="{{route('trainer_list_traniees',['user_id' => $trainer->id])}}">Back</a>

    <button class="btn btn-primary bg-dark-blue px-5 my-3 mx-auto" type="submit">ADD</button>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</section>
<!-- show the added progresses -->
<section class="col-md-9 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">

<div class="table-responsive ">
  <table class="table txt-sm table-sm border table-hover">
  <thead class="bg-mid-sand">
      <tr >
      <th scope="col">Week</th>
      <th scope="col">End Date</th>
      <th scope="col">Passed houers</th>
      <th scope="col">Absences days</th>
      <th scope="col">Notes</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      </tr>
  </thead>
  <tbody class="bg-light">
  @foreach ($traineeProgress as $progress)
      <tr>
      <td>{{ $progress->week }}</td>
      <td>{{ $progress->end_date }}</td>
      <td>{{ $progress->passed_hours }}</td>
      <td>{{ $progress->absences_days }}</td>
      <td>{{ $progress->note }}</td>
      <th scope="col">
      <a class="btn btn-sm btn-success bg-success px-4 me-2" id="update" href="{{ route('fill_traniee_progress.edit', ['user_id' => $trainer->id, 'trainee_id' => $trainee->id, 'progress_id' => $progress->id]) }}">Update</a>
      </th>
      <th scope="col">
      <form action="{{ route('fill_traniee_progress.delete', ['user_id' => $trainer->id, 'trainee_id' => $trainee->id, 'progress_id' => $progress->id]) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
          
      </form>
      </th>


</tr>
@endforeach

  </tbody>
  

  </table>
  </div>
</section>
</div>
</form>
  
<!-- <script>
var table = document.querySelector("table");
var tbody = table.querySelector("tbody");
function addRow() {
  var rowCount = tbody.querySelectorAll("tr").length;
  var row = document.createElement("tr");
  var cell1 = document.createElement("td");
  var cell2 = document.createElement("td");
  var cell3 = document.createElement("td");
  var cell4 = document.createElement("td");
  var cell5 = document.createElement("td");
  var weekNum = rowCount + 1;
  cell1.textContent = "Week " + weekNum;
  var input1 = document.createElement("input");
  input1.setAttribute("type", "date");
  input1.setAttribute("name", "end_date");
  cell2.appendChild(input1);
  var input2 = document.createElement("input");
  input2.setAttribute("type", "number");
  input2.setAttribute("id", "passed_hours");
  input2.setAttribute("name", "passed_hours");
  input2.setAttribute("min", "0");
  input2.setAttribute("max", "40");
  input2.setAttribute("value", "20");
  cell3.appendChild(input2);
  var input3 = document.createElement("input");
  input3.setAttribute("type", "number");
  input3.setAttribute("id", "absences_days");
  input3.setAttribute("name", "absences_days");
  input3.setAttribute("min", "0");
  input3.setAttribute("max", "5");
  input3.setAttribute("value", "0");
  cell4.appendChild(input3);
  var textarea = document.createElement("textarea");
  textarea.classList.add("col-10");
  cell5.appendChild(textarea);
  row.appendChild(cell1);
  row.appendChild(cell2);
  row.appendChild(cell3);
  row.appendChild(cell4);
  row.appendChild(cell5);
  tbody.appendChild(row);
}
function deleteRow() {
  var lastRow = tbody.lastElementChild;
  if (lastRow) {
    tbody.removeChild(lastRow);
  }
}
</script>
 -->
@endsection