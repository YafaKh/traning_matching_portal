@extends('all_users.master')
@section('navbar')
  @include('student.navbar')
@endsection
@section('content')
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form class="px-5" method="POST" action="{{ route('update_student_profile', [ 'user_id'=>$user->id]) }}"  enctype="multipart/form-data">
@csrf
<section class="w-100">
<div class="position-relative col-md-9 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2 w-75">
  <label class="text-light">Name: </label>
  <input type="text" class="form-control ps-4 opacity-75" disabled name="name" value="{{ old('name', $user['first_name_en'].' '.$user['second_name_en'].' '.$user['third_name_en'].' '.$user['last_name_en']) }}">
  @error('name') 
  <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
  </div> 
  @enderror
  <div class="form-group row">
    <label class="text-light mt-3" for="prev_img">Your Profile Image</label>
    <div class="d-flex flex-row">
        <img src="{{ asset('assets/img/' . $user['image']) }}" class="bd-placeholder-img me-2 rounded" width="32" height="32">
        <input id="prev_img" type="text" name="prev_img" class="form-control ps-4 opacity-75" value = "{{$user['image']}}" disabled>
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
</section>
<section class="profileSection py-3 w-75 mx-auto">
<div class="studentInfos">
<div class="mt-4 ms-5 ">
  Specialization:
      <select class="form-select ms-4 w-50" id="specialization" name="specialization">
        
        @foreach($specializations as $specialization)
        <option value="{{$specialization->id}}" {{ $user->specialization->id == $specialization->id ? 'selected' : '' }}>
          {{$specialization->name}}</option>
        @endforeach

      </select>
      <div class="row">
        @error('specialization')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
    
    <div class="mt-4 ms-5 ">
      Address:
        <select class="form-select  text-secondary w-50 ms-4" id="inputGroupSelect01" name="city">
          @foreach($cities as $city)
          <option value="{{$city->id}}" {{ $user->city->id == $city->id ? 'selected' : '' }}>
            {{$city->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-floating col-md w-50 studentInfo ms-5">
          <input type="text" class="form-control ms-4" id="email" name="email" value="{{$user->email}}" />
          <label for="email">email</label>
    </div>
    <div class="form-floating col-md w-50 studentInfo ms-5">
          <input type="text" class="form-control ms-4" id="phone" name="phone" value="{{$user->phone}}" />
          <label for="phone">phone</label>
          
    </div>
    @error('phone') 
  <div class="alert alert-danger">
    <strong>Error!</strong> {{ $message }}
  </div>
  @enderror
    <div class="form-floating col-md w-50 mb-1 studentInfo ms-5">
          <input type="text" class="form-control ms-4" id="linkedin" name="linkedin" value="{{$user->linkedin}}" />
          <label for="linkedin">linkedin</label>
    </div>
    </div>

  </section>
  <section class="profileSection studentSkills overflow-auto w-75 mx-auto">
    <div class="workExperience pb-3">
      <h1>Work experience <i class="fa-solid fa-plus text-primary"></i></h1>
      <div class="mt-4">
        <div class="anWorkExperience">
          <div class="goldenDiv"></div>
          <div class="anWorkExperienceInfo">
          
                <textarea name="expDescription" id="expDescription" cols="50" rows="10"
                class=" overflow-auto mb-2">{{$user->work_experience}}</textarea>
                
          </div>

        </div>
      </div>
</div>
  </section>
  <section class="profileSection studentGeneralInfo overflow-auto w-75 mx-auto">
    <h2 class="GeneralInfoHeader">General information</h2>
    <div>
    <div class="form-floating col-md ms-5 w-50 studentInfo">
          <input type="text" class="form-control" id="passed_hours" name="passed_hours" value="{{$user->passed_hours}}" />
          <label for="passed_hours">Number of passed hour</label>
    </div>
      <div class="input-group ms-5 w-50 my-4">
        <select class="form-select  text-secondary" id="inputGroupSelect01" name="gender">
          <option value="{{$user->gender}}" selected>Female</option>
          <option value="{{$user->gender}}">Male</option>

        </select>
      </div>
      <div class="form-floating col-md ms-5 w-50 studentInfo">
          <input type="text" class="form-control" id="gpa" name="gpa" value="{{$user->gpa}}" />
          <label for="gpa">GPA</label>
    </div>
    <div class="my-3 ms-5 ">
    <label for="english_level">English Level</label>
    <input type="range" min="1" max="5" name="english_level" value="{{ old('english_level', $user->english_level) }}">
    <div class="row">
        @error('english_level')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="my-3">
  <label>When available:</label>
  <div class="input-group form-floating" id="availability_date">
    <input type="date" class="form-control w-auto" name="availability_date" placeholder="Date" value="{{$user->availability_date}}" />
  </div>
</div>
</div>
    </div>
  </section>
  <!-- <section class="profileSection studentSkills overflow-auto w-75 mx-auto">
    <h2 class="GeneralInfoHeader">Skills <i class="fa-solid fa-plus text-primary"></i>
    </h2>
    @foreach($skills as $skill)

    <div class="skill">
      <a class="ms-5" href="#" role="button" id="addSkill"><i class="fa-solid fa-trash-can text-danger"></i>
      </a>
      <p class="ps-2 w-25">{{$skill->name}}</p>
    </div>
@endforeach
 <div class="my-3 ms-5">
        <label for="new_skills">Add New skills. Please provide them separated by commas</label>
        <input type="text" class="form-control" id="new_skills" name="new_skills" placeholder="new skills" />
        <div class="row">
        @error('new_skills')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
  </div>

  </section> -->
  <!-- <section class="profileSection studentSkills overflow-auto w-75 mx-auto px-5">
    <h2 class="GeneralInfoHeader">Additional information</h2>

    <div class="dropdown mb-4">
  <button class="form-select border py-3 text-start" type="button">Preferred company/ies :</button>
  <div class="dropdown-content col mx-2" id="preferredCompany">
    <label class="checkbox-label">
      @foreach($companies as $company)
      <div class="d-flex flex-row">
      <input type="checkbox" value="{{$company->id}}" name="preferredCompany[]" class="form-check-input" @if($user->preferredCompanies->contains($company->id)) checked @endif/>
        <p>{{$company->name}}</p>
      </div>
      @endforeach
    </label>
  </div>
  <div class="row">
    @error('preferredCompany')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="dropdown mb-4">
  <button class="form-select border py-3 text-start" type="button">Preferred city/ies :</button>
  <div class="dropdown-content col mx-2" id="preferredCity">
    <label class="checkbox-label">
      @foreach($cities as $city)
      <div class="d-flex flex-row">
        <input type="checkbox" value="{{$city->id}}" name="preferredCity[]" class="form-check-input" @if($user->cities->contains($city->id)) checked @endif/>
        <p>{{$city->name}}</p>
      </div>
      @endforeach
    </label>
  </div>
  <div class="row">
    @error('preferredCity')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="dropdown">
  <button class="form-select border py-3 text-start" type="button">Preferred training field :</button>
  <div class="dropdown-content col mx-2" id="trainingFields">
    <label class="checkbox-label">
      @foreach($trainingFields as $trainingField)
      <div class="d-flex flex-row">
        <input type="checkbox" value="{{$trainingField->id}}" name="trainingFields[]" class="form-check-input" @if($user->preferredTrainingFields->contains($trainingField->id)) checked @endif/>
        <p>{{$trainingField->name}}</p>
      </div>
      @endforeach
    </label>
  </div>
  <div class="row">
    @error('trainingFields')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>
<div class="mt-3">
  <label for="other_fields">Add any other fields. Please provide them separated by commas</label>
  <input type="text" class="form-control" id="other_fields" name="other_fields" placeholder="Other Fields" value="{{ old('other_fields') }}" />
  <div class="row">
    @error('other_fields')
      <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
</div>

  </section> -->
  </div>

  <div class="text-center d-flex col-md-5 mx-auto ">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" type="submit">Save</button>
    <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">cancel</button>
  </div>
@endsection