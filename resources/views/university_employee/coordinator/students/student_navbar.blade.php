<nav class="navbar navbar-expand-md bg-dark-blue  txt-sm">
  <div class="container-fluid px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity1')" aria-current="page" href="{{route('coordinator_list_students', ['user_id'=>$user->id])}}">List students</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity2')" aria-current="page" href="{{route('coordinator_students_companies_approval', ['user_id'=>$user->id])}}">Student-Company approval</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity3')" aria-current="page" href="{{route('coordinator_manage_supervisors', ['user_id'=>$user->id])}}"">Assign supervisors</a>
        </li>
      </ul>

      <form class="input-group w-auto h-50" role="searprimarych">
        <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
        <i class="bi bi-search txt-xsm"></i>
        </button>
      </form>
    </div>
  </div>
</nav>