@extends('company_employee.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('content')
<form class="px-5" method="POST" action="{{ route('hr_update_company_profile', ['company_id' => $company_id]) }}">
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
        <img src="{{ asset('images/' . $company_data['image']) }}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
        <input id="prev_img" type="text" name="prev_img" class="form-control ps-4 opacity-75" value = "{{$company_data['image']}}" disabled>
    </div>
  </div>
  <label class="text-light mt-3" >If you want to the profile, choose a new one.</label>
  <input class="form-control ps-4  opacity-75" type="file" name="imge"  id="formFile">
  @error('image') 
  <div class="alert alert-danger">
    <strong>Error!</strong> {{ $message }}
  </div> @enderror
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
      @foreach ($errors->get('email.*') as $error)
        <div class="alert alert-danger">{{ $error }}</div>
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
      @foreach ($errors->get('phone.*') as $error)
        <div class="alert alert-danger">{{ $error }}</div>
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
  @error('linkedin') <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
</div> @enderror
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
  @foreach($company_data->branches as $branch)
    <div class="d-flex">
      <input type="text" class="form-control mb-2 me-2 ps-4" name="old_branch[]" value="{{ old('old_branch.' . $loop->index, $branch['address']) }}">
      <button class="btn d-flex delete_old" type="button">
          <i class="bi bi-trash3 fs-6 text-danger"></i>
          <i class="bi bi-arrow-clockwise"></i>
      </button>
    </div>
  @endforeach
  @foreach ($errors->get('branch.*') as $error)
    <div class="alert alert-danger">{{ $error }}</div>
  @endforeach
  <hr>
  <div id="branch-container">
    
  </div>
  <div class="input-group mb-3">
    <span class="input-group-text" onClick="add_input('branch')">
      <i class="bi bi-plus-square fs-6"></i>
    </span>
    <input type="text" class="form-control ps-4" name="new_branch" placeholder="New Branch">
  </div>
</section>
<section class="col-md-9 col-11 bg-white mb-3 p-md-5 p-3 mx-auto rounded-2">
    <h4 class="border-bottom pb-2 mb-4">Contact Employees</h4>
    <p>Note: use ctrl key to selct muliple employees</p>
    <select class="form-select" name="contactable" size="15" multiple>
      @foreach($company_data->employees as $employee)
        @if($employee->contactable == 1)
          <option value="{{$employee['id']}}" selected>{{$employee['id']}}- {{$employee['first_name']}} {{$employee['last_name']}}</option>
        @else
          <option value="{{$employee['id']}}">{{$employee['id']}}- {{$employee['first_name']}} {{$employee['last_name']}}</option>
        @endif
      @endforeach
    </select>
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
    newInput.value = input.value;

    const newButton = document.createElement('button');
    newButton.className = 'btn delete';
    newButton.innerHTML = '<i class="bi bi-trash3 fs-6 text-danger float-start"></i>';

    newButton.addEventListener('click', function() {
      // Remove the parent div when the delete button is clicked
      newDiv.remove();
    });

    newDiv.appendChild(newInput);
    newDiv.appendChild(newButton);
    container.appendChild(newDiv);
    input.value = ''; // Clear the new email input field
  }

  const deleteOldBranches = document.querySelectorAll('.delete_old');
  deleteOldBranches.forEach(button => {
    button.addEventListener('click', function() {
      const input = this.parentNode.querySelector('input');
      input.disabled = !input.disabled;   
    });
  });

</script>

@endsection