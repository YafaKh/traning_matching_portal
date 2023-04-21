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
            <a class="nav-link @yield('Profile_activity')"  href="{{route('hr_company_profile')}}">Profile</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @yield('students_activity')" href="{{route('hr_list_trainees')}}" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Trainees</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('hr_list_trainees')}}">List trainees</a></li>
                <li><a class="dropdown-item" href="{{route('hr_university_students')}}">University trainees</a></li>
                <li><a class="dropdown-item" href="{{route('hr_assign_trainees')}}">Assign trainers</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('Employees_activity')" href="{{route('hr_list_Employees')}}">Employees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('Messaging_activity')" href="{{route('hr_messaging')}}">Messaging</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
</nav>