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
    <div class="d-flex justify-content-between flex-sm-row flex-column mt-5">
        <div class="d-flex flex-row">
            <select select class="form-select border-gray me-2 mb-2 txt-sm w-25" >
                <option selected>Semester</option>
                <option value="1">Fall</option>
                <option value="2">Spring</option>
                <option value="3">First Summer</option>
                <option value="4">Second Summer</option>
            </select>
            <select class="filter-dropdown form-select border-gray me-2 mb-2 txt-sm w-25"  data-column="1">
                <option value="All">Feild</option>
                @foreach($training_feilds as $training_feild)
                <option value="{{$training_feild['name']}}">{{ $training_feild['name'] }}</option>
                @endforeach
            </select>
            <select class="filter-dropdown form-select border-gray me-2 mb-2 txt-sm w-25"  data-column="2">
                <option value="All">Trainer</option>
                @foreach($trainers as $trainer)
                <option value="{{ $trainer['first_name']}} {{ $trainer['last_name']}}">
                {{ $trainer['first_name']}} {{ $trainer['last_name']}}
                </option>
                @endforeach
            </select>
            <select class="filter-dropdown form-select border-gray me-2 mb-2 txt-sm w-25"  data-column="3">
                <option value="All">Branch</option>
                @foreach($branches as $branch)
                    <option value="{{$branch->city->name}}-{{$branch['address']}}">{{$branch->city->name}}-{{$branch['address']}}</option>
                @endforeach
            </select>
            <form class="input-group mb-2 h-50 w-50" role="searprimarych">
            <input class="form-control txt-sm border border-secondary" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form> 
        </div>
        <a href="{{route('hr_add_training', ['company_id' => $company_id])}}"
        class="btn btn-sm btn-primary bg-dark-blue text-light opacity-75 px-3 w-auto h-50">
        Add Training</a> 
    </div>
        
    {{-- Trainings table--}}
    <div class="table-responsive mt-3">
        <table class="table txt-sm table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3">Training Name</th>
            <th scope="col">Training Feild</th>
            <th scope="col">Trainer</th>
            <th scope="col">Branch</th>
            <th scope="col">Details</th>
            <th scope="col">Delete</th> 
            </tr>
        </thead>
        <tbody class="bg-light" id="table-body">
            @foreach($trainings_data as $training)
            <tr>
            <td class="ps-3">{{$training['name']}}</td>
            <td>{{$training->training_feild->name ?? ''}}</td>
            <td>{{ $training->employee['first_name'] ?? '' }} 
                {{ $training->employee['last_name'] ?? '' }}</td>
            <td>{{$training->branch->city->name}}-{{$training->branch['address']}}</td>
            <td style="vertical-align: top;">
                <a class="btn btn-link txt-sm" data-bs-toggle="collapse" href="#details{{$training['id']}}" 
                    aria-expanded="false" aria-controls="details{{$training['id']}}">Show more</a>
                <div class="collapse" id="details{{$training['id']}}">
                    <div class="card card-body" style="width: 300px;">{{$training['details']}}</div>
                </div>
            </td>
            <td>
                <a type="submit" class="btn"
                href="{{ route('hr_delete_training', ['company_id' => $company_id, 'training_id' => $training->id]) }}"
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