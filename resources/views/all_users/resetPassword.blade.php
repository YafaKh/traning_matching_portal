@extends('all_users.master')
@section('content')

  <div class="bigDiv">
    <div class="headingDiv">
      <h1 class="heading">Welcome to Matching Portal</h1>
      <img src="{{asset('images/logo_title.png')}}" alt="logo" class="logo">

      <img src="{{asset('images/loginImg.png')}}" alt="login Image" class="imgElement">
    </div>
    <div class="loginForm">
      <div class="card border-0 bg-transparent d-flex align-items-center ">
        <div class="card-body loginCard">
            <h2 class="card-title text-center mb-5 mt-3">Reset Password</h2>
            <form>
                  <div class="mb-3">
                    <input type="email" class="form-control loginInput" placeholder="Email">
                    <input type="password" class="form-control loginInput" placeholder="Password">
                    <input type="password" class="form-control loginInput" placeholder="Confirm password">
                    <input class="btn resetbtn" type="submit" value="Reset ">
                    <input class="btn resetbtn" type="button" value="Back ">
                  </div>
                </form>
        </div>
      </div>
    </div>
  </div>
 @endsection