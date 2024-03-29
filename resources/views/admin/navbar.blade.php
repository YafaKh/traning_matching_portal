<nav class="navbar navbar-expand-md shadow-sm px-sm-5">
        <a class="navbar-brand w-25">
            <img src="{{asset('images/logo.png')}}" alt="logo" class="" />Admin Name</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav-items" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_companies')}}">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_companies_employees')}}">companies' employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_university_employees')}}">University Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin_students')}}">Students</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout',['user_type' => 'admin'])}}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>