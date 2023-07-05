@extends('all_users.master')
@section('content')
<div class="body">
  <div class="bigDiv">
    <div class="headingDiv">
      <h1 class="heading">Welcome to Matching Portal</h1>
      <img src="{{asset('images/logo_title.png')}}" alt="logo" class="UserPagelogo">

      <img src="{{asset('images/loginImg.png')}}" alt="login Image" class="imgElement">
    </div>
    <div class="loginForm">
      <div class="card border-0 bg-transparent d-flex align-items-center ">
        <div class="card-body userTypeCard">
            <h2 class="card-title text-center">Who are you ?</h2>
              <form>
                <div class=" d-flex flex-column">
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'admin'])}}" role="button">
                    <h1>ِAdmin</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'student'])}}" role="button">
                    <h1>Student</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'company_employee'])}}" role="button">
                    <h1>Company Employee</h1>
                </a>
                <a class="btn userType p-2" href="{{route('login', ['user_type' => 'university_employee'])}}" role="button">
                    <h1>University Employee</h1>
                </a>  
              

                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection