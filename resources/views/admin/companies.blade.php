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
            <a class="nav-link" href="#">Companies want to join</a>
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
      <div
        class="d-flex flex-lg-row flex-sm-column justify-content-evenly mb-4 mt-3"
      >
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25 py-3"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
      </div>

      <div
        class="d-flex flex-lg-row flex-sm-column justify-content-evenly mb-4 mt-3"
      >
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25 py-3"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
      </div>
      <div
        class="d-flex flex-lg-row flex-sm-column justify-content-evenly mb-4 mt-3"
      >
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25 py-3"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
      </div>
      <div
        class="d-flex flex-lg-row flex-sm-column justify-content-evenly mb-4 mt-3"
      >
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25 py-3"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
        <div
          class="d-flex flex-colmun bg-light align-items-center company-box justify-content-center w-25"
        >
          <img
            src="{{asset('images/company_img1.png')}}"
            alt=""
            class="rounded-circle col-4 company_img1 w-25 me-3"
          />
          <div class="mt-4 mx-3">
            <a href="http://" class="text-decoration-none">Company Name</a>
            <p>industry</p>
          </div>
        </div>
      </div>
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
