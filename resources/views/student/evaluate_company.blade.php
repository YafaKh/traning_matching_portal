@extends('student.layout.master')
@section('navbar')
  @include('student.layout.navbar')
@endsection
@section('content')
<form action="{{route('student_evaluate_company.add')}}" method="POST" enctype="multipart/form-data">
@csrf

      <section class="profileSection mb-3">
        <div class="position-relative col-md-9 bg-dark-blue p-5 w-auto h-25 mt-1 rounded-top-2 ">
        </div>
        <div class=" col-md-9 bg-white mb-3 p-md-5 px-3 mx-auto rounded-bottom-2 d-flex">
          <div class="d-flex flex-column col-sm-6 col-md-8 col-10 ">
            <div class="col studentInfo-evaluateCompany">
                <p >Student Name</p>
                <p>{{$student->first_name_en}}</p><hr>
            </div>
            <div class="col studentInfo-evaluateCompany">
                <p>ID</p>
                <p>{{$student->student_num}}</p><hr>
            </div>
            <div class="col studentInfo-evaluateCompany">
                <p>Training place name :</p>
                <p>{{--$companyName--}}</p><hr>
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
        @foreach($allSkills as $allSkill)
        <div class=" g-2 ms-3 mb-2">
        <div class="form-check col">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          <label class="form-check-label" for="flexCheckDefault" id="name">
          {{$allSkill->name}}
          </label>

        </div>
       
      </div>
      @endforeach
     
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
          <input type="range" min="1" max="100" value="30" class="w-100" name="training_palce_evaluation" />
        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Pros of the training place
          </label>
            <div class="col mt-5">
            <textarea name="pros" id="pros" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Cons of the training place
          </label>
            <div class="col mt-5">
            <textarea name="cons" id="cons" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            New skills gained from training
            <!-- new_skills_gained -->
          </label>
            <div class="col mt-5">
            <textarea name="new_skills_gained" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Skills you would like if they were included in training?          </label>
            <!-- skills_wish_they_included -->
            <div class="col mt-5">
            <textarea name="skills_wish_they_included" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-3">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Skills that were not given well ? how can they be given better?          </label>
           <!-- skills_wish_were_given_better -->
            <div class="col mt-5">
            <textarea name="skills_wish_were_given_better" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-3">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Would you recommend sending students to this company/organization?</label>
          <!-- recommend_sending_students -->
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" value="1" name="recommend_sending_students" id="flexRadioDefault1" />
            <label class="form-check-label" for="flexRadioDefault1" >
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="recommend_sending_students" id="flexRadioDefault2" value="0" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>
</div>
</section>
<section class="profileSection">
    <div class="form-floating ms-4 mb-3 gx-5">
        <div class="p-5">
          <label for="">Which is better for the training degree ? Explain why?</label>
         <!-- recommended_evaluate_sys_explanation -->
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="recommended_evaluate_sys" id="flexRadioDefault1" value="numbers"/>
            <label class="form-check-label" for="flexRadioDefault1">
              Numbers
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="recommended_evaluate_sys" id="flexRadioDefault2" value="letters" checked />
            <label class="form-check-label" for="flexRadioDefault2"> letters </label>
          </div>
          <div class="form-floating mt-5 w-50">
            <input type="text" class="form-control" id="floatingInput"  placeholder="else" name="recommended_evaluate_sys_explanation" />
            <label for="floatingInput">else</label>
          </div>
      </div>
</div>
</section>
<section class="profileSection mb-3">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Do you think the right time for an internship is it before the senior year?</label>
          <!-- internship_time_before_senior_year -->
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="internship_time_before_senior_year" id="flexRadioDefault1" value="1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="internship_time_before_senior_year" id="flexRadioDefault2" value="0" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>
</div>
</section>
<section class="profileSection mb-4">
    <div class="form-floating ms-4 mb-4 gx-5">
        <div class="mb-3 p-5 pb-0">
          <label for="">Should there be more than one internship in the student's plan ?</label>
          <!-- more_than_one_internship -->
          <div class="form-check col my-3">
            <input class="form-check-input" type="radio" name="more_than_one_internship" id="flexRadioDefault1" value="1" />
            <label class="form-check-label" for="flexRadioDefault1">
              Yes
            </label>
          </div>
          <div class="form-check col">
            <input class="form-check-input" type="radio" name="more_than_one_internship" id="flexRadioDefault2" value="0" checked />
            <label class="form-check-label" for="flexRadioDefault2"> No </label>
          </div>
      </div>
</div>
</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Difficulties in finding training ? 
          <!--  finding_training_difficulties-->
          </label>
            <div class="col mt-5">
            <textarea name="finding_training_difficulties" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Any other recommendations about the company ?     
          <!-- recommendations -->
          </label>
            <div class="col mt-5">
            <textarea name="recommendations" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<section class="profileSection mb-4">

    <div class="row g-2 p-5 ms-4">
          <label class="form-check-label" for="flexCheckDefault">
            Notes for website improvement ?    
          <!-- notes_about_website -->
          </label>
            <div class="col mt-5">
            <textarea name="notes_about_website" id="expDescription" cols="67" rows="7" 
            class="overflow-auto"></textarea>        </div>
      </div>  

</section>
<div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
    <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="submit">
      Submit
    </button>
    <button class="btn btn-secondary text-light px-5 my-3 ms-1 flex-grow-1 col-md" type="button">
      Back
    </button>
  </div>
</form>
@endsection