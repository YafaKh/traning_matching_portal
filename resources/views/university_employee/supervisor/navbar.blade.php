<nav class="navbar navbar-expand-md shadow-sm">
<div class="container-fluid ms-5">
    <a class="navbar-brand" href="{{route('supervisor_list_students',['user_id',$supervisor->id])}}" >
    <img src="{{asset('images/logo.png')}}" alt="Logo">
    {{$supervisor->first_name}} {{$supervisor->last_name}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-5">
        <li class="nav-item">
        <a class="nav-link @yield('students_activity')" href="{{route('supervisor_list_students',['user_id',$supervisor->id])}}">My Students</a>
        </li>
        <li class="nav-item">
        <a class="nav-link @yield('visits_activity')" href="{{route('list_visit_forms',['user_id',$supervisor->id])}}">Visit Forms</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Logout</a>
        </li>
    </ul>
    </div>
</div>
</nav>