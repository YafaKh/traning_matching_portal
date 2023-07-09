@extends('all_users.master')
@section('content')
<div class="body">
  <div class="bigDiv">
    <div class="headingDiv">
      <h1 class="heading">Welcome to Matching Portal</h1>
      <img src="{{asset('images/logo_title.png')}}" alt="logo" class="logo">

      <img src="{{asset('images/loginImg.png')}}" alt="login Image" class="imgElement">
    </div>
    <div class="loginForm">
      <div class="card border-0 bg-transparent d-flex align-items-center ">
        <div class="card-body loginCard">
          <h2 class="card-title text-center mb-5 mt-3">Login</h2>
          <form enctype="multipart/form-data" action="{{ route('authenticate', ['user_type' => $user_type]) }}" method="POST">
          @csrf 
           <div class="mb-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <input type="email" class="form-control loginInput" placeholder="Email" name="email">
              <input type="password" class="form-control loginInput" placeholder="Password" name="password">
              <input class="btn loginBtn" type="submit" value="log in ">
              @if($user_type != 'admin')
              <a href="{{route($user_type.'_registeration')}}" class="creatAccountLink">Creat an account</a>
              @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection