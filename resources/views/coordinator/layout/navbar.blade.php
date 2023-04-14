    {{--navbar--}}
    <nav class="navbar navbar-expand-sm border-buttom">
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
            <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle @yield('students_activity')" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Students
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">List students</a></li>
                <li><a class="dropdown-item" href="#">Student-Company approval</a></li>
                <li><a class="dropdown-item" href="#">Assign supervisors</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('supervisors_activity')" href="#">Supervisors</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('companies_activity')" href="#">Companies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('activity4')" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>