@extends('company_employee.master')
@section('navbar')
    @include('company_employee.trainer.navbar')
@endsection
@section('traineess_activity')
    active
@endsection
@section('content')
<div class="px-5">
    <div class="col-md-4 mx-auto">
    <form class="input-group mt-5 mb-3 w-auto" role="searprimarych">
        <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search by student name" aria-label="Search">
        <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
        <i class="bi bi-search txt-xsm"></i>
        </button>
    </form></div>
    {{-- students table --}}
    <div class="table-responsive col-lg-9 mx-auto">
        <table class="table txt-sm table-sm border table-hover shadow">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Name</th>
            <th scope="col">Traning</th>
            <th scope="col">Progress</th>
            <th scope="col">Evaluation</th>
            </tr>
        </thead>
        @foreach($allTrainings as $allTraining )

        @foreach($allTrainees as $allTrainee)

        <tbody class="bg-light">
   
        <tr>

            <td class="ps-3" name="">{{$allTrainee->first_name_en}} {{$allTrainee->second_name_en}} {{$allTrainee->third_name_en}} {{$allTrainee->last_name_en}}</td>
           @if($allTraining->semester == "1")
            <td>Fall - {{$allTraining->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</td>
         @elseif($allTraining->semester == '2')
         <td>Spring - {{$allTraining->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</td>
         @elseif($allTraining->semester == '3')
         <td>First Summer - {{$allTraining->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</td>
         @elseif($allTraining->semester == '4')
         <td>Second Summer - {{$allTraining->year}} - {{$trainer->first_name}} {{$trainer->last_name}}</td>
        @endif
            <td><a type="button" class="btn" href="{{route('fill_traniee_progress', ['user_id' => $trainer->id,'trainee_id' => $allTrainee->id])}}">
            <i class="bi bi-box-arrow-up-right"></i></a></td>
            <td><a type="button" class="btn" href="{{route('fill_traniee_evaluation', ['user_id' => $trainer->id,'trainee_id' => $allTrainee->id])}}">
            <i class="bi bi-box-arrow-up-right"></i></a></td>
          
            </tr>
            
            
           
        </tbody>
        @endforeach
        @endforeach
        </table>
    </div>
        {{$allTrainees->links()}}
</div>
@endsection