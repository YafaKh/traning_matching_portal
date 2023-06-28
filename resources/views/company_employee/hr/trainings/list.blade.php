@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('Trainings_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex justify-content-between flex-column mt-5">
        <div class="d-flex justify-content-between">
            <form action="{{ route('hr_list_trainings', ['user_id' => $user->id]) }}" method="GET" class="d-flex">
                <select class="form-select border-gray me-3 mb-2 txt-sm w-auto" data-column="1" name="filter">
                    <option value="latest" {{ $request->input('filter') === 'latest' ? 'selected' : '' }}>Latest Training</option>
                    <option value="all" {{ $request->input('filter') === 'all' ? 'selected' : '' }}>All Trainings</option>
                </select>
                <button type="submit" class="btn btn-sm bg-sand btn-outline-secondary me-2 mb-2">Apply</button>
            </form>
            <a href="{{route('hr_add_training', ['user_id'=>$user->id])}}"
            class="btn btn-sm btn-primary bg-dark-blue text-light opacity-75 px-3 w-auto h-50">
            Add Training</a> 
        </div>
        <div class="d-flex flex-sm-row flex-column mt-1">
            <select class="form-select border-gray me-2 mb-2 txt-sm flex-grow-1"  data-column="1">
                <option value="All">Field</option>
                @foreach($training_fields as $training_field)
                <option value="{{$training_field['name']}}">{{ $training_field['name'] }}</option>
                @endforeach
            </select>
            <select class=" form-select border-gray me-2 mb-2 txt-sm flex-grow-1"  data-column="2">
                <option value="All">Trainer</option>
                @foreach($trainers as $trainer)
                <option value="{{ $trainer['first_name']}} {{ $trainer['last_name']}}">
                {{ $trainer['first_name']}} {{ $trainer['last_name']}}
                </option>
                @endforeach
            </select>
            <select class="form-select border-gray me-2 mb-2 txt-sm flex-grow-1"  data-column="3">
                <option value="All">Branch</option>
                @foreach($branches as $branch)
                    <option value="{{$branch->city->name}}-{{$branch['address']}}">{{$branch->city->name}}-{{$branch['address']}}</option>
                @endforeach
            </select>
            <form class="input-group mb-2 h-50 flex-grow-1 " role="searprimarych">
            <input class="form-control txt-sm border border-secondary" type="search" placeholder="Search" id="search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form> 
        </div>
    </div>
        
    {{-- Trainings table--}}
    <div class="table-responsive mt-3">
        <table class="table txt-sm table-hover" id="table">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Training Name</th>
            <th scope="col">Training Field</th>
            <th scope="col">Trainer</th>
            <th scope="col">Branch</th>
            <th scope="col">Details</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach($trainings as $training)
            <tr>
            <td class="ps-3">{{$training['name']}}</td>
            <td>{{$training->training_field->name ?? ''}}</td>
            <td>{{ $training->employee['first_name'] ?? '' }} 
                {{ $training->employee['last_name'] ?? '' }}</td>
            <td>{{$training->branch->city->name}}-{{$training->branch['address']}}</td>
            <td style="vertical-align: top;">
                <a class="btn btn-link txt-sm" data-bs-toggle="collapse" href="#details{{$training['id']}}" 
                    aria-expanded="false" aria-controls="details{{$training['id']}}">Show more</a>
                <div class="collapse" id="details{{$training['id']}}">
                    <div class="card card-body" style="width: 300px;">
                        Semester: 
                        @if($training['semester']==1)
                        Fall
                        @esleif($training['semester']==2)
                        Spring
                        @esleif($training['semester']==3)
                        First Summer
                        @else
                        Second Summer 
                        @endif
                        -{{$training['year']}}<br>
                        {{$training['details']}}
                    </div>
                </div>
            </td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('hr_delete_training', [ 'user_id'=>$user->id, 'training_id' => $training->id]) }}"
                onClick="return confirm('Are you sure?')">
                <i class="bi bi-trash3 fs-6 text-danger"></i>
                </a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>

@endsection