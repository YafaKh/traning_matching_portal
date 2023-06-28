<nav class="navbar navbar-expand-md bg-dark-blue  txt-sm">
  <div class="container-fluid px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        @if($user->company_employee_role_id==3)
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity')" aria-current="page" 
          href="{{route('home')}}"
          >My trainees</a> 
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity1')" aria-current="page" 
          href="{{route('hr_list_trainees', [ 'user_id'=>$user->id])}}"
          >Our trainees</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity2')" aria-current="page" 
          href="{{route('hr_university_students', ['user_id'=>$user->id])}}"
          >University students</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity3')" aria-current="page" 
          href="{{route('hr_manage_trainings', ['user_id'=>$user->id])}}"
          >Assign trainings</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
