@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('company_employee.trainer.navbar')
    @else
    @include('company_employee.hr.navbar')
    @endif
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

        @foreach($allTrainees as $trainee)

        <tbody class="bg-light">
   
        <tr>

            <td class="ps-3">
                <a class="link-dark link-underline-opacity-0 fw-bold" 
                href="{{ route('hr_student_profile', ['user_id'=>$user->id, 'student_id'=> $trainee->id ]) }}">
                {{$trainee->first_name_en}} {{$trainee->second_name_en}} {{$trainee->third_name_en}} {{$trainee->last_name_en}}
                </a>
            </td>
           @if($allTraining->semester == "1")
            <td>Fall - {{$allTraining->year}} - {{$user->first_name}} {{$user->last_name}}</td>
         @elseif($allTraining->semester == '2')
         <td>Spring - {{$allTraining->year}} - {{$user->first_name}} {{$user->last_name}}</td>
         @elseif($allTraining->semester == '3')
         <td>First Summer - {{$allTraining->year}} - {{$user->first_name}} {{$user->last_name}}</td>
         @elseif($allTraining->semester == '4')
         <td>Second Summer - {{$allTraining->year}} - {{$user->first_name}} {{$user->last_name}}</td>
        @endif
            <td><a type="button" class="btn" href="{{route('fill_traniee_progress', ['user_id' => $user->id,'trainee_id' => $trainee->id])}}">
            <i class="bi bi-box-arrow-up-right"></i></a></td>
            <td><a type="button" class="btn" href="{{ $trainee->evaluate_student_id ? route('show_traniee_evaluation',
                 ['user_id' => $user->id, 'trainee_id' => $trainee->id]) : route('fill_traniee_evaluation', ['user_id' => $user->id, 'trainee_id' => $trainee->id]) }}">
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