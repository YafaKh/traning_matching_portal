<nav class="navbar navbar-expand-md shadow-sm px-sm-5">
  <div class="container-fluid mx-5">
    <a class="navbar-brand ms-sm-5" href="#"><img src="{{asset('images/logo.png')}}" alt="Logo"> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link @yield('profile_activity')" href="{{ route('student_profile', ['user_id' => $user->id]) }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @yield('progress_activity')" href="#">My progress</a>
        </li>
        <li class="nav-item">
        @if ($user->training && $user->training->branch && $user->training->branch->company)
            <a class="nav-link @yield('progress_activity')" href="{{ route('company_profile', ['user_id' => $user->id, 'company_id' => $user->training->branch->company->id]) }}">My company</a>
        @else
            <a class="nav-link @yield('progress_activity')" href="{{ route('no_company', ['user_id' => $user->id]) }}">My company</a>
        @endif
        </li>
      </ul>
      <ul class="navbar-nav ms-auto me-sm-5 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="{{route('logout',['user_type' => 'student'])}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
