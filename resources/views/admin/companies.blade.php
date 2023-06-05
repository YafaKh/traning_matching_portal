@extends('admin.layout.master')
@section('navbar')
  @include('admin.layout.navbar')
@endsection
@section('content')

    <nav class="navbar navbar-expand-md shadow-sm px-sm-5">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-items d-flex" id="navbarNav">
        <ul class="navbar-nav w-75 d-flex justify-content-start">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"
              >All companies</a
            ><!-- active -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin_compnies_want_to_join')}}">Companies want to join</a>
          </li>
        </ul>
        <input
          class="form-control me-5 w-25"
          type="search"
          placeholder="Search"
          aria-label="Search"
        />
      </div>
    </nav>
    
    <section>
   
    @for($i = 0; $i < count($allCompanies); $i += 2)
  <div class="d-flex flex-lg-row flex-sm-column justify-content-evenly mb-4 mt-3">
    @php $firstCompany = $allCompanies[$i]; @endphp
    <div class="position-relative d-flex flex-row bg-light align-items-center company-box justify-content-center w-25 py-3">
      <img src="{{$firstCompany->image}}" alt="" class="rounded-circle col-6 w-25 h-auto" />
      <div class="mt-4 mx-3 col-6">
        <a href="http://" class="text-decoration-none">{{$firstCompany->name}}</a>
        <p>{{$firstCompany->industry}}</p>
      </div>
    </div>

    @if($i+1 < count($allCompanies))
      @php $secondCompany = $allCompanies[$i+1]; @endphp
      <div class="position-relative d-flex flex-row bg-light align-items-center company-box justify-content-center w-25 py-3">
        <img src="{{$secondCompany->image}}" alt="" class="rounded-circle col-6 w-25 h-auto" />
        <div class="mt-4 mx-3 col-6">
          <a href="http://" class="text-decoration-none">{{$secondCompany->name}}</a>
          <p>{{$secondCompany->industry}}</p>
        </div>
      </div>
    @endif
  </div>
@endfor
 
      <nav aria-label="..." class="d-flex justify-content-center mt-5">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Previous</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <span class="page-link">2</span>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </section>

@endsection
