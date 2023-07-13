@extends('all_users.master')
@section('navbar')
  @include('student.navbar')
@endsection
@section('content')
<form class="px-5" method="POST" action="{{ route('edit_student_profile', [ 'user_id'=>$user->id]) }}"  enctype="multipart/form-data">
@csrf
<section class="w-100">
<div class="position-relative col-md-9 bg-dark-blue p-5 mx-auto mt-4 rounded-top-2 w-75">
  <label class="text-light">Name: </label>
  <input type="text" class="form-control ps-4 opacity-75" name="name" value="{{ old('name', $user['first_name_en'].' '.$user['second_name_en'].' '.$user['third_name_en'].' '.$user['last_name_en']) }}">
  @error('name') 
  <div class="alert alert-danger">
      <strong>Error!</strong> {{ $message }}
  </div> 
  @enderror
  <div class="form-group row">
    <label class="text-light mt-3" for="prev_img">Your Profile Image</label>
    <div class="d-flex flex-row">
        <img src="{{ asset('assets/img/' . $user['image']) }}" class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32">
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
      <select class="form-select ms-4 w-50" id="specialization" name="specialization">
        <!--here the user can choose multi value-->
        <option selected>Specialization</option>
        @foreach($specializations as $specialization)

        <option value="{{$specialization->id}}">{{$specialization->name}}</option>
        @endforeach

      </select>
      <div class="row">
        @error('specialization')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
    </div>
      <div class="input-group w-50 studentInfo mt-3 ms-5">
        <select class="form-select  text-secondary w-50 ms-4" id="inputGroupSelect01">
          <option selected>address</option>
          @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
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
        <select class="form-select  text-secondary" id="inputGroupSelect01">
          <option value="{{$user->gender}}" selected>Female</option>
          <option value="{{$user->gender}}">Male</option>

        </select>
      </div>
      <div class="form-floating col-md ms-5 w-50 studentInfo">
          <input type="text" class="form-control" id="gpa" name="gpa" value="{{$user->gpa}}" />
          <label for="gpa">GPA</label>
    </div>
    </div>
  </section>
  <section class="profileSection studentSkills overflow-auto w-75 mx-auto">
    <h2 class="GeneralInfoHeader">Skills <i class="fa-solid fa-plus text-primary"></i>
    </h2>
    @foreach($skills as $skill)

    <div class="skill">
      <a class="ms-5" href="#" role="button"><i class="fa-solid fa-trash-can text-danger"></i>
      </a>
      <p class="ps-2 w-25">{{$skill->name}}</p>
    </div>
@endforeach
    
    <div class="skill d-inline">
      <div class="input-group d-flex flex-row mb-3 w-50 h-75">
        <input type="text" class="form-control ms-5 w-25" placeholder=" New skill" aria-label="Recipient's username" aria-describedby="button-addon2">
        <a class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-plus-square fs-6" > </i></a>
      </div>

    </div>

  </section>
  <section class="profileSection studentSkills overflow-auto w-75 mx-auto ">
    <h2 class="GeneralInfoHeader">Additional information</h2>
    <div class="info">
      <h3 class="fs-6 fw-bold">Preferred city for training:</h3>
      <div class="input-group w-50  h-75 studentInfo">
        <select class="form-select  text-secondary" id="multiselect" multiple="multiple">
        @foreach($cities as $city)
          <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
        </select>
       
      </div>
      <!-- <div class="row">
        <div class="selected-box">Jenin </div>
        <div class="selected-box">Nablus </div>
      </div> -->
    </div>

    <div class="info">
      <h3 class="fs-6 fw-bold">preferred training field:</h3>

      <div class="input-group w-50 studentInfo">
      <select class="form-select  text-secondary" id="multiselect" multiple="multiple">
        @foreach($trainingFields as $field)
          <option value="{{$field->id}}">{{$field->name}}</option>
        @endforeach
        </select>
       
      </div>
      <!-- <div class="row">
        <div class="selected-box">Web -front end </div>


      </div> -->
    </div>
    <div class="info">
      <h3 class="fs-6 fw-bold">when available:</h3>
      <div class="input-group date w-50 mb-2" id="datepicker">
        <input type="date" class="form-control " placeholder="Date">
      </div>
  </section>
  </div>

  <div class="text-center d-flex col-md-5 mx-auto ">
    <a class="btn btn-primary bg-dark-blue text-light px-5 my-3 me-2 flex-grow-1" href="{{route('edit_student_profile',['user_id'=> $user->id])}}">Save</a>
    <button class="btn btn-secondary text-light px-5 my-3 flex-grow-1" type="button">cancel</button>
  </div>
@endsection