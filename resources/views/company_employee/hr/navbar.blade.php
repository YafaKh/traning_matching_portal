{{--navbar--}}
    <nav class="navbar navbar-expand-sm shadow-sm">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="#" >
        <img src="{{asset('images/logo.png')}}" alt="Logo">
        EmployeeName*
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
            <li class="nav-item">
            <a class="nav-link @yield('Profile_activity')" href="#">Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('Trainees_activity')" href="#">Trainees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('Employees_activity')" href="#">Employees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('Messaging_activity')" href="#">Messaging</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
</nav>