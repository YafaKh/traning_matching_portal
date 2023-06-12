@extends('all_users.master')
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
        <select class="form-select ps-4 border-gray me-3 mb-2 w-auto" id="city-filter" name="city">
            <option value="All">City</option>
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
    <div class="table-responsive mt-4">
        <table class="table table-hover" >
            <thead class="bg-mid-sand">
                <tr>
                    <th scope="col" class="ps-3">Name</th>
                    <th scope="col">Emails</th>
                    <th scope="col">Phones</th>
                    <th scope="col">Branches</th> 
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($companies as $company)
                <tr class="company-row">
                    <td class="ps-3">
                        <a class="link-dark link-underline-opacity-0 fw-bold" href="{{route('show_company_profile', ['company_id' => $company->id])}}">
                            {{$company['name']}}</a>
                    </td>
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
                        <table class="table table-hover branches-table" id="table{{$company->id}}">
                            <tbody class="bg-light">
                                @foreach($company->branches as $branch)
                                <tr class="branch">
                                    <td>{{$branch->city->name}}</td>
                                    <td>{{$branch->address}}</td>                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
  // Event listener for filter change
  $('#city-filter').change(filterTable);

  function filterTable() {
    var cityFilter = $('#city-filter option:selected').text();

    // Loop through each company row in the table
    $('.company-row').each(function() {
        var companyRow = $(this);
        var branchTable = companyRow.find('td:eq(3)').find('table');

        // Loop through each branch row in the table
        branchTable.find('tbody tr').each(function() {
            var branchRow = $(this);
            var city = branchRow.find('td:eq(0)').text();

            // Show/hide rows based on filter criteria
            if (cityFilter === city || cityFilter === "City") {
                branchRow.show();
                companyRow.show();
            } else {
                branchRow.hide();
        }
        });

        // Hide the company row if no branches match the filter
        if (branchTable.find('tbody tr:visible').length === 0) {
          companyRow.hide();
        } 
    });
  }
});
</script>
@endsection