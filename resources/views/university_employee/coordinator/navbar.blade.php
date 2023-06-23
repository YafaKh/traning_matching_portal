    <nav class="navbar navbar-expand-sm shadow-sm">
    <div class="container-fluid ms-5">
        <a class="navbar-brand" href="{{route('coordinator_list_students', ['user_id'=>$user->id])}}" >
        <img src="{{asset('images/logo.png')}}" alt="Logo">
        {{$user['first_name']}} {{$user['last_name']}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 mx-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle @yield('students_activity')" href="{{route('coordinator_list_students', ['user_id'=>$user->id])}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Students
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('coordinator_list_students', ['user_id'=>$user->id])}}">List students</a></li>
                <li><a class="dropdown-item" href="{{route('coordinator_students_companies_approval', ['user_id'=>$user->id])}}">Student-Company approval</a></li>
                <li><a class="dropdown-item" href="{{route('coordinator_manage_supervisors', ['user_id'=>$user->id])}}">Assign supervisors</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('employees_activity')" href="{{route('coordinator_list_employees', ['user_id'=>$user->id])}}">Employees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link @yield('companies_activity')" href="{{route('coordinator_list_companies', ['user_id'=>$user->id])}}">Companies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>