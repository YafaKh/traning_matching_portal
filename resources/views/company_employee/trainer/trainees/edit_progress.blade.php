@extends('company_employee.master')
@section('navbar')
@include('company_employee.trainer.navbar')
@endsection

@section('content')

<div class="px-2">
<section class="">
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

  <!-- edit and update -->

<form action="{{route('fill_traniee_progress.update', ['user_id' => $trainer->id,'trainee_id' => $trainee->id,'progress_id' => $progress->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
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
      <tr>
      <td><input type="text" name="week" id="week" value="{{ $progress->week }}" class="w-50">
      <div class="row">
      @error('week')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </td>
      <td><input type = "date" name = "end_date" value="{{ $progress->end_date }}"
">
      <div class="row">
        @error('end_date')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </td>
      
      <td><input type="number" id="passed_hours" name="passed_hours" min="0" max="40" value="{{ $progress->passed_hours }}">
      <div class="row">
        @error('passed_hours')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
</td>
      <td><input type="number" id="absences_days" name="absences_days" min="0" max="5" value ="{{ $progress->absences_days }}">
      <div class="row">
        @error('absences_days')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div></td>
      
      <td><textarea class="col-10" name="note" placeholder="{{ $progress->note }}
"></textarea>
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
<a class="btn btn-secondary px-5 my-3 mx-auto" type="button" href="{{route('fill_traniee_progress', ['user_id' => $trainer->id,'trainee_id' => $trainee->id])}}">Cancel</a>

   <button class="btn btn-success px-5 my-3 mx-auto" type="submit">Update</button>

</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</section>
</form>

@endsection