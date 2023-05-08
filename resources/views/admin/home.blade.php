@extends('admin.layout.master')
@section('navbar')
  @include('admin.layout.navbar')
@endsection
@section('content')
    <section class="w-75 m-auto bg-primary mt-0 d-flex justify-content-evenly align-items-center row g-0">
        <div class="adminComponent ms-5 d-flex justify-content-center align-items-center flex-column col-6 col-sm-8">
            <i class="bi bi-buildings icon bg-primary text-light mt-3"></i>
            <h1 for="" class="fs-6 fw-bold">Companies</h1>
        </div>
        <div class="adminComponent d-flex justify-content-center align-items-center flex-column col col-sm-4">
            <i class="bi bi-person-vcard-fill icon"></i>
            <h1 for="" class="fs-6 fw-bold w-75 text-center">Company Employees</h1>
        </div>
        <div class="adminComponent d-flex justify-content-center align-items-center flex-column col-sm-8">
            <i class="bi bi-person-fill icon"></i>
            <h1 for="" class="fs-6 fw-bold">Students</h1>
        </div>
        <div class="adminComponent d-flex justify-content-center align-items-center flex-column me-5 col-sm-4">
            <i class="bi bi-person-workspace icon"></i>
            <h1 for="" class="fs-6 fw-bold w-75 text-center">
                University Employees
            </h1>
        </div>
    </section>
    <section class="w-75 m-auto bg-light mt-0">
        <div class="line-text-center p-5">
            <h2 class="fs-5 text-center fw-light fs-6">companies want to join</h2>
        </div>
        <div class="row mx-5 row mx-5 d-flex justify-content-center align-items-center">
            <img src="{{asset('images/company_img1.png')}}" alt="" class="col-2 rounded-circle"/>
            <div class="col-7 mt-4 mx-3">
                <label for="">UpWork</label>
                <p>
                    upwork connects businesses with independent professionals and
                    agencies around the globe. Where companies
                </p>
            </div>
            <button class="btn btn-primary col-2 btn-more" type="submit">More</button>

        </div>
        <div class="row mx-5 mt-5 row mx-5 d-flex justify-content-center align-items-center">
            <img src="{{asset('images/company_img2.png')}}" alt="" class="col-2 rounded-circle"/>
            <div class="col-7 mt-4 mx-3">
                <label for="">UpWork</label>
                <p>
                    upwork connects businesses with independent professionals and
                    agencies around the globe. Where companies
                </p>
            </div>
            <button class="btn btn-primary col-2 btn-more" type="submit">More</button>

        </div>
    </section>

@endsection