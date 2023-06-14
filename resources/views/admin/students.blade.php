@extends('all_users.master')
@section('navbar')
  @include('admin.navbar')
@endsection
@section('activity1')
    active
@endsection
@section('content')
{{-- students table --}}
<div class="table-responsive p-5">
        <table class="table border table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col"  class="ps-4">Name</th>
            <th scope="col">Specialization</th>
            <th scope="col">Company</th>
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach($students as $student)
            <tr>
            <td class="ps-4" data-registered="{{$student['registered']}}">
                {{$student['first_name_en']}} {{$student['last_name_en']}}
            </td>
            <td>{{$student->specialization->name}}</td>
            <td>{{$student->training->branch->company->name ?? ''}}-{{$student->training->branch->city->name ?? ''}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{$students->links()}}

    </div>
@endsection
