@extends('all_users.master')
@section('content')
<section>
  <div class="position-relative col-md-9 bg-dark-blue px-5 py-4 mx-auto mt-4 rounded-top-2">
    <h2 class="text-light">Trainee's progress</h2>
  </div>
  <div class=" col-md-9 bg-white mb-3 px-md-5 p-3 mx-auto rounded-bottom-2">
    <div class="d-flex flex-row ">
        <div class="me-5">
            <p>Trainee's Name</p>
            <p>{{$student->first_name_en}} {{$student->last_name_en}}</p><hr>
        </div>
        <div class="ms-5">
            <p>Training</p>
            @if($Student ->training->semester ?? "__" == "1")
            <td>Fall - {{$Student ->training->year}} - {{$Student ->training->employee->first_name ?? "__"}} {{$Student ->training->employee->last_name ?? "__"}}</td>
            @elseif($Student ->training->semester ?? "__" == '2')
            <td>Spring - {{$Student ->training->year}} - {{$Student ->training->employee->first_name ?? "__"}} {{$Student ->training->employee->last_name ?? "__"}}</td>
            @elseif($Student ->training->semester ?? "__" == '3')
            <td>First Summer - {{$Student ->training->year}} - {{$Student ->training->employee->first_name ?? "__"}} {{$Student ->training->employee->last_name ?? "__"}}</td>
            @elseif($Student ->training->semester ?? "__" == '4')
            <td>Second Summer - {{$Student ->training->year}} - {{$Student ->training->employee->first_name ?? "__"}} {{$Student ->training->employee->last_name ?? "__"}}</td>
            @elseif($Student ->training->semester ?? "__" == "__")
            <td>__</td>
            @endif
        </div>
    </div>
   </div>
</section>
<!-- show progress -->
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
      </tr>
  </thead>
  <tbody class="bg-light">
  @foreach ($studentProgress as $progress)
      <tr>
      <td>{{ $progress->week }}</td>
      <td>{{ $progress->end_date }}</td>
      <td>{{ $progress->passed_hours }}</td>
      <td>{{ $progress->absences_days }}</td>
      <td>{{ $progress->note ?? "___"}}</td>
      </tr>
@endforeach

  </tbody>
  

  </table>
  </div>
</section>
<div class="text-center">
</div>
@endsection