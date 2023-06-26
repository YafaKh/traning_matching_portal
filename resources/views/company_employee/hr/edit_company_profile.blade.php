@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('content')
<form class="px-5" method="POST" action="{{ route('hr_update_company_profile', [ 'user_id'=>$user->id]) }}"  enctype="multipart/form-data">
@csrf
<section>
<div class="position-relative col-md-9 col-11 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2">
  <label class="text-light">Name: </label>
  <input type="text" class="form-control ps-4 opacity-75" name="name" value="{{ old('name', $company_data['name']) }}">
  @error('name') 
  <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
  </div> 
  @enderror
  <div class="form-group row">
    <label class="text-light mt-3" for="prev_img">Your Profile Image</label>
    <div class="d-flex flex-row">
        <img src="{{ asset('assets/img/' . $company_data['image']) }}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
        <input id="prev_img" type="text" name="prev_img" class="form-control ps-4 opacity-75" value = "{{$company_data['image']}}" disabled>
    </div>
  </div>
  <label class="text-light mt-3" >If you want to the profile, choose a new one.</label>
  <input class="form-control ps-4  opacity-75" type="file" name="image"  id="formFile">
  @error('image') 
  <div class="alert alert-danger">
    <strong>Error!</strong> {{ $message }}
  </div>
  @enderror
</div>
<div class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-bottom-2">
  <div class="col-8 d-inline-block">
  <p>Industry: </p>
  <input type="text" class="form-control mb-4 ps-4" name="industry" value="{{ old('industry', $company_data['industry']) }}">
  @error('industry') 
  <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
  </div> @enderror
  <p>Website: </p>
  <input type="text" class="form-control mb-4 ps-4" name="website" value="{{ old('website', $company_data['website']) }}">
  @error('website') 
  <div class="alert alert-danger">
    <strong>Error!</strong> {{ $message }}
  </div> @enderror
  <p>Emails: </p>
    <div id="email-container">
      @foreach($company_data->emails as $email)
        <div class="d-flex">
          <input type="text" class="form-control mb-2 me-2 ps-4" name="email[]" value="{{ old('email.' . $loop->index, $email['email_address']) }}">
          <button class="btn delete"><i class="bi bi-trash3 fs-6 text-danger float-start"></i></button>
        </div>
      @endforeach
      @foreach ($errors->get('email.*') as $errorArray)
        @foreach ($errorArray as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endforeach
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" onClick="add_input('email')">
        <i class="bi bi-plus-square fs-6"></i>
      </span>
      <input type="text" class="form-control ps-4" name="new_email" placeholder="New Email">
    </div>
  <p>Phones: </p>
    <div id="phone-container">
      @foreach($company_data->phones as $phone)
        <div class="d-flex mb-2">
          <input type="text" class="form-control mb-2 me-2 ps-4" name="phone[]" value="{{ old('phone.' . $loop->index, $phone['phone_no']) }}">
          <button class="btn delete"><i class="bi bi-trash3 fs-6 text-danger float-start"></i></button>
        </div>
      @endforeach
      @foreach ($errors->get('phone.*') as $errorArray)
        @foreach ($errorArray as $error)
          <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
      @endforeach
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" onClick="add_input('phone')">
        <i class="bi bi-plus-square fs-6"></i>
      </span>
      <input type="text" class="form-control ps-4" name="new_phone" placeholder="New Phone">
    </div>
    
  <p>LinkedIn: </p>
  <input type="text" class="form-control mb-4 ps-4" name="linkedin" value="{{ old('linkedin', $company_data['linkedin']) }}">
  @error('linkedin') 
  <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
  </div>
 @enderror
  </div>
</div>

</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Description </p>
<textarea class="form-control mt-4 ps-4" name="description">{{ old('description', $company_data['description']) }}</textarea>
@error('description') <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
</div> @enderror
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
<p class="fs-4">Branches</p>
  @foreach($company_data->branches as $index => $branch)
    <div class="row">
      <div class="col-4">
        <select class="form-select rounded-0 ps-4" name="old_city[]">
          @foreach($cities as $city)
            @if($city['id'] == $branch['city_id'])
              <option value="{{$city['id']}}" selected>{{$city['name']}}</option>
            @else
              <option value="{{$city['id']}}">{{$city['name']}}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="col">
        <input type="text" class="form-control mb-2 me-2 ps-4" name="old_branch[]" branch_id="{{$branch['id']}}"
        value="{{ old('old_branch.' . $index, $branch['address']) }}">
      </div>
    </div>
  @endforeach
  @foreach ($errors->get('branch.*') as $error)
    <div class="alert alert-danger">{{ $error }}</div>
  @endforeach
  <hr>
  <div id="branch-container">
    
  </div>
  New Branch:
  <div class="row g-0 mt-1">
    <div class="col-1">
      <span class="input-group-text rounded-end-0" onClick="add_input('branch')">
        <i class="bi bi-plus-square fs-6"></i>
      </span>
    </div>
    <div class="col-4">
      <select class="form-select rounded-0 mb-4 ps-4" id="city" name="city">
        @foreach($cities as $city)
        <option value="{{$city['id']}}">{{$city['name']}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-7">
      <input type="text" class="form-control ps-4 rounded-start-0" name="new_branch" placeholder="Branch Adess">
    </div>
  </div>
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
    <h4 class="border-bottom pb-2 mb-4">Contact Employees</h4>

    <div class="form-group">
    @foreach($company_data->employees as $employee)
        <div class="form-group">
        <input type="checkbox" id="contactable_{{ $employee->id }}" name="contactable[]" value="{{ $employee->id }}" {{ $employee->contactable ? 'checked' : '' }}>

            <label for="contactable_{{ $employee->id }}">{{$employee['first_name']}} {{$employee['last_name']}}</label>
        </div>
    @endforeach

      </div>
    @foreach ($errors->get('contactable.*') as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
</section>
<div class="text-center d-flex col-md-5 mx-auto">
  <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" type="submit">Save</button>
  <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">Cancel</button>
</div>
</form>

<script>
  // Add event listener to delete buttons
  const deleteButtons = document.querySelectorAll('.delete');
  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Remove the parent div when the delete button is clicked
      this.parentNode.remove();
    });
  });

  function add_input(type) {
  const plusButton = document.querySelector('.input-group-text');
  const input = document.querySelector('input[name="new_' + type + '"]');
  const container = document.querySelector('#' + type + '-container');

  const newDiv = document.createElement('div');
  newDiv.className = 'd-flex';

  const newInput = document.createElement('input');
  newInput.type = 'text';
  newInput.className = 'form-control mb-2 me-2 ps-4';
  newInput.name = type + '[]';

  if (type === 'branch') {
    const selectElement = document.getElementById('city');
    const selectedCityId = selectElement.options[selectElement.selectedIndex].value;
    const selectedCity = selectElement.options[selectElement.selectedIndex].text;
    newInput.value = '('+selectedCityId+')'+selectedCity+'-' + input.value;
  } else {
    newInput.value = input.value;
  }

  const newButton = document.createElement('button');
  newButton.className = 'btn delete';
  newButton.innerHTML = '<i class="bi bi-trash3 fs-6 text-danger float-start"></i>';

  newButton.addEventListener('click', function () {
    // Remove the parent div when the delete button is clicked
    newDiv.remove();
  });

  newDiv.appendChild(newInput);
  newDiv.appendChild(newButton);
  container.appendChild(newDiv);
  input.value = ''; // Clear the new email/phone input field
}


</script>

@endsection