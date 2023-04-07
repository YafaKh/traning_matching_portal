<nav class="navbar navbar-expand-md bg-dark-blue  txt-sm">
  <div class="container-fluid px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity1')" aria-current="page" href="#">List students</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity2')" aria-current="page" href="#">Students' accounts approval</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity3')" aria-current="page" href="#">Student-Company approval</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity4')" aria-current="page" href="#">Assign supervisors</a>
        </li>
      </ul>
      <form class="d-flex input-group w-auto" role="search">
        <input class="form-control txt-sm " type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-light btn-sm btn-hover" type="submit">
            <i class="bi bi-searchs text-secondary"></i>
            </button>
      </form>
    </div>
  </div>
</nav>