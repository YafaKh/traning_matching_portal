@extends('admin.layout.master')
@section('navbar')
  @include('admin.layout.navbar')
@endsection
@section('content')
  <nav class="navbar navbar-expand-md shadow-sm px-sm-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-items d-flex" id="navbarNav">
      <ul class="navbar-nav w-75 d-flex justify-content-start">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">All companies</a><!-- active -->
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Companies want to join</a>
        </li>
      </ul>
      <input class="form-control me-5 w-25" type="search" id="search" placeholder="Search" aria-label="Search" />
    </div>
  </nav>
  <section class="d-flex justify-content-center">
   
    <div class="d-flex flex-column w-75 mt-5">
      <div class="d-flex flex-row bg-light align-items-center justify-content-between p-3 pe-5 mb-3">
       
        <img src="{{asset('images/company_img1.png')}}" alt="" class="rounded-circle join_company_img" />
        <div class="mt-4 col-md-2">
          <a href="http://" class="text-decoration-none">Company Name</a>
          <p class="">industry</p>
        </div>
        <div class="d-flex col-md-2 flex-column">
          <div class="d-flex flex-row"><i class="bi bi-telephone-fill text-primary me-2"></i>
          <p>0555555555</p></div>
          
          <div class="d-flex flex-row"><i class="bi bi-telephone-fill text-primary me-2"></i>
            <p>0555555555</p></div>
            <div class="d-flex flex-row"><i class="bi bi-telephone-fill text-primary me-2"></i>
            <p>0555555555</p></div>
        </div>
        <div class="d-flex col-md-2 flex-column">
          <div class="d-flex flex-row"> <i class="bi bi-envelope-fill text-primary me-2"></i>
            <p>email@email.com</p></div>
            <div class="d-flex flex-row"> <i class="bi bi-envelope-fill text-primary me-2"></i>
            <p>email@email.com</p></div>
        </div>
        <div class="d-flex col-md-4">
          <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
            Accept
          </button>
          <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
            Reject
          </button>
        </div>
      </div>
      <div class="d-flex flex-row bg-light align-items-center justify-content-between p-3 pe-5 mb-3">
       
        <img src="{{asset('images/company_img1.png')}}" alt="" class="rounded-circle join_company_img" />
        <div class="mt-4 col-md-2">
          <a href="http://" class="text-decoration-none">Company Name</a>
          <p class="">industry</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-telephone-fill text-primary me-2"></i>
          <p>0555555555</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-envelope-fill text-primary me-2"></i>
          <p>email@email.com</p>
        </div>
        <div class="d-flex col-md-4">
          <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
            Accept
          </button>
          <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
            Reject
          </button>
        </div>
      </div>
      <div class="d-flex flex-row bg-light align-items-center justify-content-between p-3 pe-5 mb-3">
       
        <img src="{{asset('images/company_img1.png')}}" alt="" class="rounded-circle join_company_img" />
        <div class="mt-4 col-md-2">
          <a href="http://" class="text-decoration-none">Company Name</a>
          <p class="">industry</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-telephone-fill text-primary me-2"></i>
          <p>0555555555</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-envelope-fill text-primary me-2"></i>
          <p>email@email.com</p>
        </div>
        <div class="d-flex col-md-4">
          <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
            Accept
          </button>
          <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
            Reject
          </button>
        </div>
      </div>
      <div class="d-flex flex-row bg-light align-items-center justify-content-between p-3 pe-5 mb-3">
       
        <img src="{{asset('images/company_img1.png')}}" alt="" class="rounded-circle join_company_img" />
        <div class="mt-4 col-md-2">
          <a href="http://" class="text-decoration-none">Company Name</a>
          <p class="">industry</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-telephone-fill text-primary me-2"></i>
          <p>0555555555</p>
        </div>
        <div class="d-flex col-md-2">
          <i class="bi bi-envelope-fill text-primary me-2"></i>
          <p>email@email.com</p>
        </div>
        <div class="d-flex col-md-4">
          <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
            Accept
          </button>
          <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
            Reject
          </button>
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