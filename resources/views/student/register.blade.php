@extends('student.layout.master')
@section('content')

  <div class="d-flex justify-content-center mt-5">
    <img src="{{asset('images/logo_title.png')}}" alt="logo" class="w-25" />
  </div>
  <section class="registerSection">
    <div class="d-flex justify-content-center">
      <h1 class="mt-5">Sign up</h1>
    </div>

    <form action="{{route('student_store')}}" method="POST" enctype="multipart/form-data">
      <!-- <input type="hidden" name="_token"> -->
      @csrf
    <div class="m-5">
      <label for="" class="mt-3 mb-3"> Name (Arabic)</label>
      <div class="row g-2">
        <div class="form-floating col-md ">
          <input type="text" class="form-control" id="first_arabic_name" name="first_arabic_name" placeholder="First" />
          <label for="floatingInput">First</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
        
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="second_arabic_name" name="second_arabic_name" placeholder="Second" />
          <label for="floatingInput">Second</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
           @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_arabic_name" name="third_arabic_name" placeholder="Third" />
          <label for="floatingInput">Third</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
           @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_arabic_name" name="last_arabic_name" placeholder="Last" />
          <label for="floatingInput">Last</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
      </div>
    </div>
    <div class="mx-5">
      <label for="" class=" mb-3"> Name (English)</label>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="first_english_name" name="first_english_name" placeholder="First" />
          <label for="floatingInput">First</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="second_english_name" name="second_english_name" placeholder="Second" />
          <label for="floatingInput">Second</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
      </div>
      <div class="row g-2">
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="third_english_name" name="third_english_name" placeholder="Third" />
          <label for="floatingInput">Third</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
        <div class="form-floating col-md">
          <input type="text" class="form-control" id="last_english_name" name="last_english_name" placeholder="Last" />
          <label for="floatingInput">Last</label>
          <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
        </div>
      </div>
      </div>
      <div class="m-5">
      <div class="form-floating ">
        <input type="text" class="form-control" id="StudentID" name="StudentID" placeholder="StudentID" />
        <label for="floatingInput">StudentID</label>
        <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="Studentphone" name="Studentphone" placeholder="Phone number" />
        <label for="floatingInput">Phone number</label>
        <div class="text-danger mt-3 mb-3">
          <!-- error message --> 
          @error('email')
          {{$message}}
          @enderror
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="StudentEmail" name="StudentEmail" placeholder="University email" />
        <label for="floatingInput">University email</label>
        <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control" id="StudentAddress" name="StudentAddress" placeholder="Permanent residence address " />
        <label for="floatingInput">Permanent residence address </label>
        <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
      </div>

    <div class="form-floating">

      <div class="form-check">
      <div class="row g-2 ms-3 mb-2">
        <div class="form-check">
          @foreach($allLanguages as $allLanguage)
          <input class="form-check-input mt-2" type="checkbox" value="{{$allLanguage -> id}}" name="skill" id="flexCheckDefault" checked />
          <label class="form-check-label fs-5" for="flexCheckDefault">
          {{$allLanguage -> name}}
         <!-- Arabic -->
          </label>
        </div>

        <div class="d-flex justify-content-center">
        <label class="form-check-label ms-5 col" for="flexCheckDefault">
            listning
          </label>
          <input type="range" min="1" max="100" value="30"name="" class="w-75 col me-5" />
          
        </div>
        <div class="d-flex justify-content-center">
        <label class="form-check-label ms-5 col" for="flexCheckDefault">
            writing
          </label>
          <input type="range" min="1" max="100" value="30"name="" class="w-75 col me-5" />
        </div>
        <div class="d-flex justify-content-center">
        <label class="form-check-label ms-5 col" for="flexCheckDefault">
            speaking
          </label>
          <input type="range" min="1" max="100" value="30"name="" class="w-75 col me-5" />
          
        </div>
        <div class="form-check mt-3">
          <input class="form-check-input mt-2" type="checkbox" value="{{$allLanguage -> id}}" name="skill" id="flexCheckDefault"  />
          <label class="form-check-label fs-5" for="flexCheckDefault">
          {{$allLanguage -> name}}
          <!-- English -->
          </label>
        </div>
        <div class="form-check mt-3">
          <input class="form-check-input mt-2" type="checkbox" value="{{$allLanguage -> id}}" name="skill" id="flexCheckDefault"  />
          <label class="form-check-label fs-5" for="flexCheckDefault">
          {{$allLanguage -> name}}
          </label>
        </div>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    <div class="form-floating ms-4 mb-4 d-flex flex-row gx-5">
      <div class="col"><label for="">Gender</label></div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="StudentGender" id="StudentGender1" checked/>
        <label class="form-check-label" for="flexRadioDefault1">
          Female
        </label>
      </div>
      <div class="form-check col">
        <input class="form-check-input" type="radio" name="StudentGender" id="StudentGender2" />
        <label class="form-check-label" for="flexRadioDefault2">
          Male
        </label>
      </div>
      
    </div>
    <div class="text-danger mt-3 mb-3">
          <!-- error message -->
           @error('email')
          {{$message}}
          @enderror
        </div>

    <div class="form-floating mb-4">
      <select class="form-select" id="inputGroupSelect01">
        <!--here the user can choose multi value-->
        <option value="no" selected>Specialization</option>
        <option value="MMT">MMT</option>
        <option value="CS">CS</option>
      </select>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="floatingInput" name="gpa" placeholder="GPA" />
      <label for="floatingInput">GPA</label>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="text" class="form-control" id="floatingInput" name="passed_hours" placeholder="Number of passed hour" />
      <label for="floatingInput">Number of passed hour</label>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Password" />
      <label for="floatingInput">Password</label>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    <div class="form-floating mb-4">
      <input type="password" class="form-control" id="floatingInput" name="cofirmPassword" placeholder="Confirm password" />
      <label for="floatingInput">Confirm password</label>
      <div class="text-danger mt-3 mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
    </div>
    
      <div class="uploadImage">
        <input type="file" class="form-control SetImage " name="image" id="inputGroupFile01" />

          <input type="text" class="form-control" id="floatingInput" placeholder="         Personal image" />
          <i class="fa-solid fa-link imgicon"></i>
          <div class="text-danger mb-3">
          <!-- error message -->
          @error('email')
          {{$message}}
          @enderror
        </div>
      </div>
 
  </section>
  <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="submit">
      Submit
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
  </form>
@endsection