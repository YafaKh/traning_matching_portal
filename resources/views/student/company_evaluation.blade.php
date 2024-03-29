@extends('all_users.master')
@section('navbar')
  @include('student.navbar')
@endsection
@section('content')
<form action="{{route('student_evaluate_company.add',['user_id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
@csrf
<section class="profileSection my-4">
        <div class="position-relative col-md-9 bg-dark-blue p-5 w-auto h-25 mt-1 rounded-top-2 ">
        </div>
        <div class=" col-md-9 bg-white mb-3 p-md-5 px-3 mx-auto rounded-bottom-2 d-flex">
            <div class="d-flex flex-column col-sm-6 col-md-8 col-10 ">
                <div class="col studentInfo-evaluateCompany">
                    <p>Student Name: {{$user->first_name_en}}</p><hr>
                </div>
                <div class="col studentInfo-evaluateCompany">
                    <p>ID: {{$user->student_num}}</p><hr>
                </div>
                <div class="col studentInfo-evaluateCompany">
                    <p>Training place name: {{$companyName}}</p><hr>
                </div>
            </div>
        </div>
        <p class="text-danger ms-4">* Note that you can't edit this form once you submit it.</p>
    </section>

    <section class="profileSection mb-3">
        <div class="form-floating ms-4 mb-4 gx-5">
            <div class="form-floating ms-4 mb-4 gx-5">
                <div class="mb-5 p-5 pb-0">
                    <label for="">Skills that you’ve trained in training:</label>
                </div>
                <!-- training filed or skills ?? -->

                <div class="col mt-5">
                    <textarea id="skills_you_trained" cols="67" rows="7" name="skills_you_trained"
                              class="overflow-auto">{{ old('skills_you_trained') }}</textarea>
                </div>
            </div>
        </div>
    </section>
    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Training place evaluation:
            </label>
            <div class="col mt-5">
                <input type="range" min="1" max="5" value="{{ old('training_palce_evaluation', '30') }}" class="w-100" name="training_palce_evaluation" />
            </div>
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Pros of the training place
            </label>
            <div class="col mt-5">
                <textarea name="pros" id="pros" cols="67" rows="7" class="overflow-auto">{{ old('pros') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('pros')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Cons of the training place
            </label>
            <div class="col mt-5">
                <textarea name="cons" id="cons" cols="67" rows="7" class="overflow-auto">{{ old('cons') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('cons')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                New skills gained from training
            </label>
            <div class="col mt-5">
                <textarea name="new_skills_gained" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('new_skills_gained') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('new_skills_gained')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Skills you would like if they were included in training?
            </label>
            <div class="col mt-5">
                <textarea name="skills_wish_they_included" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('skills_wish_they_included') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('skills_wish_they_included')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-3">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Skills that were not given well? How can they be given better?
            </label>
            <div class="col mt-5">
                <textarea name="skills_wish_were_given_better" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('skills_wish_were_given_better') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('skills_wish_were_given_better')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-3">
        <div class="form-floating ms-4 mb-4 gx-5">
            <div class="mb-3 p-5 pb-0">
                <label for="">Would you recommend sending students to this company/organization?</label>
                <div class="form-check col my-3">
                    <input class="form-check-input" type="radio" value="1" name="recommend_sending_students" id="flexRadioDefault1" {{ old('recommend_sending_students') == '1' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="recommend_sending_students" id="flexRadioDefault2" value="0" {{ old('recommend_sending_students', '0') == '0' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault2"> No </label>
                </div>
            </div>
        </div>
    </section>

    <section class="profileSection">
        <div class="form-floating ms-4 mb-3 gx-5">
            <div class="p-5">
                <label for="">Which is better for the training degree? Explain why?</label>
                <div class="form-check col my-3">
                    <input class="form-check-input" type="radio" name="recommended_evaluate_sys" id="flexRadioDefault1" value="numbers" {{ old('recommended_evaluate_sys') == 'numbers' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Numbers
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="recommended_evaluate_sys" id="flexRadioDefault2" value="letters" {{ old('recommended_evaluate_sys', 'letters') == 'letters' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault2"> letters </label>
                </div>
                <div class="col mt-5">
                    <textarea id="expDescription" placeholder="why" cols="50" rows="3" name="recommended_evaluate_sys_explanation" class="overflow-auto">{{ old('recommended_evaluate_sys_explanation') }}</textarea>
                </div>
                <div class="row">
                    @error('recommended_evaluate_sys_explanation')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </section>

    <section class="profileSection mb-3">
        <div class="form-floating ms-4 mb-4 gx-5">
            <div class="mb-3 p-5 pb-0">
                <label for="">Do you think the right time for an internship is it before the senior year?</label>
                <div class="form-check col my-3">
                    <input class="form-check-input" type="radio" name="internship_time_before_senior_year" id="flexRadioDefault1" value="1" {{ old('internship_time_before_senior_year') == '1' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="internship_time_before_senior_year" id="flexRadioDefault2" value="0" {{ old('internship_time_before_senior_year', '0') == '0' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault2"> No </label>
                </div>
            </div>
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="form-floating ms-4 mb-4 gx-5">
            <div class="mb-3 p-5 pb-0">
                <label for="">Should there be more than one internship in the student's plan?</label>
                <div class="form-check col my-3">
                    <input class="form-check-input" type="radio" name="more_than_one_internship" id="flexRadioDefault1" value="1" {{ old('more_than_one_internship') == '1' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                    </label>
                </div>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="more_than_one_internship" id="flexRadioDefault2" value="0" {{ old('more_than_one_internship', '0') == '0' ? 'checked' : '' }} />
                    <label class="form-check-label" for="flexRadioDefault2"> No </label>
                </div>
            </div>
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Difficulties in finding training?
            </label>
            <div class="col mt-5">
                <textarea name="finding_training_difficulties" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('finding_training_difficulties') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('finding_training_difficulties')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Any other recommendations about the company?
            </label>
            <div class="col mt-5">
                <textarea name="recommendations" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('recommendations') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('recommendations')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <section class="profileSection mb-4">
        <div class="row g-2 p-5 ms-4">
            <label class="form-check-label" for="flexCheckDefault">
                Notes for website improvement?
            </label>
            <div class="col mt-5">
                <textarea name="notes_about_website" id="expDescription" cols="67" rows="7" class="overflow-auto">{{ old('notes_about_website') }}</textarea>
            </div>
        </div>
        <div class="row">
            @error('notes_about_website')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </section>

    <div class="text-center d-flex col-md-5 mx-auto my-4 row g-2 w-25">
        <button class="btn btn-primary bg-dark-blue text-light px-5 my-3 flex-grow-1 col-md" type="submit">
            Submit
        </button>
    </div>
</form>
@endsection
