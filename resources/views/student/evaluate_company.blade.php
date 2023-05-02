@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')

      <section class="profileSection mb-3">
        <div class="position-relative col-md-9 bg-dark-blue p-5 w-auto h-25 mt-1 rounded-top-2 ">
        </div>
        <div class=" col-md-9 bg-white mb-3 p-md-5 px-3 mx-auto rounded-bottom-2 d-flex">
          <div class="d-flex flex-column col-sm-6 col-md-8 col-10 ">
            <div class="col studentInfo-evaluateCompany">
                <p >Student Name</p>
                <p>*****</p><hr>
            </div>
            <div class="col studentInfo-evaluateCompany">
                <p>ID</p>
                <p>***</p><hr>
            </div>
            <div class="col studentInfo-evaluateCompany">
                <p>Training place name :</p>
                <p>***</p><hr>
            </div>
          </div>
        </div>
        </section>     
  <section class="profileSection mb-3">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-5 p-5 pb-0">
          <label for="">Skills that you’ve  trained in training :</label>
        </div>
        <div class="ps-5">
        <div class=" g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
       
      </div>
      <div class=" g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
      
      </div>
      <div class=" g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        
      </div>
      <div class=" g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked />
          <label class="form-check-label" for="flexCheckDefault">
            Default checkbox
          </label>
        </div>
        
      </div>
    </div>
      <div class="form-floating mt-5 mb-4 w-50 ms-5 pb-4">
        <input type="text" class="form-control" id="floatingInput" placeholder="else" />
        <label for="floatingInput">else</label>
      </div>
      </div>

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Training place evaluation: 
                   </label>
        <div class="col mt-5">
          <input type="range" min="1" max="100" value="30" class="w-100" />
        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Pros of the training place
          </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            New skills gained from training
          </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Skills you would like if they were included in training?          </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-3">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Skills that were not given well ? how can they be given better?          </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-3">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Would you recommend sending students to this company/organization?</label>
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>
</div>
</section>
<section class="profileSection">
    <div class="form-floating ms-4 mb-3 gx-5">
        <div class="p-5">
          <label for="">Which is better for the training degree ? Explain why?</label>
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
          <div class="form-floating mt-5 w-50">
            <input type="text" class="form-control" id="floatingInput" placeholder="else" />
            <label for="floatingInput">else</label>
          </div>
      </div>

</section>
<section class="profileSection mb-3">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Do you think the right time for an internship is it before the senior year?</label>
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>

</section>
<section class="profileSection mb-4">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Should there be more than one internship in the student's plan ?</label>
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Difficulties in finding training period ?        </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Any other recommendations ?          </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Notes for website improvement ?           </label>
            <div class="col mt-5">
            <textarea name="expDescription" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="button">
      Submit
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
@endsection