@extends('university_employee.master')
@section('navbar')
    @include('university_employee.coordinator.navbar')
@endsection
@section('companies_activity')
    active
@endsection
@section('content')
<div class="px-5">
    {{--filters--}}
    <div class="d-flex flex-row mt-5">
        <select class="form-select ps-4 border-gray me-3 mb-2 w-auto" id="city" name="city">
            @foreach($cities as $city)
            <option value="{{$city['id']}}">{{$city['name']}}</option>
            @endforeach
        </select>
        <form class="input-group mb-2 h-50 w-25" role="searprimarych">
            <input class="form-control border-gray" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
            <i class="bi bi-search txt-xsm"></i>
            </button>
            </form>
    </div>
        
    {{-- supervisors table--}}
    <div class="table-responsive mt-4">
        <table class="table table-hover">
        <thead class="bg-mid-sand">
            <tr >
            <th scope="col" class="ps-3" >Name</th>
            <th scope="col">Emails</th>
            <th scope="col">Phones</th>
            <th scope="col">Branches</th> 
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach($companies as $company)
            <tr>
            <td class="ps-3">{{$company['name']}}</td>
            <td>
                <ul class="list-unstyled">
                @foreach($company->emails as $email)
                    <li class="mt-2 mb-3">{{$email->email_address}}</li>
                @endforeach
                </ul>
            </td>
            <td>
                <ul class="list-unstyled">
                @foreach($company->phones as $phone)
                    <li class="mt-2 mb-3">{{$phone->phone_no}}</li>
                @endforeach
                </ul>
            </td>
            <td>
                <ul class="list-unstyled">
                @foreach($company->branches as $branch)
                    <li class="mt-2 mb-3">{{$branch->city->name}}-{{$branch->address}}</li>
                @endforeach
                </ul>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection