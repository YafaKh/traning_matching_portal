<nav class="navbar navbar-expand-md shadow-sm">
<div class="container-fluid ms-5">
    <a class="navbar-brand" href="{{route('trainer_list_traniees', ['user_id' => $user->id])}}" >
    <img src="{{asset('images/logo.png')}}" alt="Logo">
    {{$user->first_name}} {{$user->last_name}}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-5">
        <li class="nav-item">
        <a class="nav-link" href="{{route('trainer_list_traniees', ['user_id' => $user->id])}}">My Traniees</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('logout',['user_type' => 'company_employee'])}}">Logout</a>
        </li>
    </ul>
    </div>
</div>
</nav>