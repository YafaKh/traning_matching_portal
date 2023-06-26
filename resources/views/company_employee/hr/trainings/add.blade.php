@extends('all_users.master')
@section('navbar')
    @include('company_employee.hr.navbar')
@endsection
@section('Trainings_activity')
    active
@endsection
@section('content')
<form enctype="multipart/form-data" action="{{route('hr_store_training', ['user_id'=>$user->id])}}" method="POST">
    @csrf
    <div class="pt-5 d-flex flex-column col-md-8 col-11 mx-auto ">  
    <div class="d-flex flex-sm-row flex-column mt-4 mb-2 mx-auto col-12">
            <select class="form-select me-2 mb-2  flex-grow-1" id="semester" name="semester">
                <option selected>Semester</option>
                <option value="1">Fall-{{ date('Y') }} </option>
                <option value="2">Spring-{{ date('Y') }} </option>
                <option value="3">First Summer-{{ date('Y') }} </option>
                <option value="4">Second Summer-{{ date('Y') }} </option>
                <option value="5">Fall-{{ date('Y')+1 }} </option>
            </select>
            <select class="form-select me-2 mb-2  flex-grow-1" name="branch">
                <option selected>Branch</option>
                @foreach($branches as $branche)
                <option value="{{$branche['id']}}">{{$branche['address']}}</option>
                @endforeach
            </select>
            <select class="form-select me-2 mb-2 flex-grow-1" id= "trainer"name="trainer">
                <option selected>Trainer</option>
                @foreach($trainers as $trainer)
                <option value="{{$trainer['id']}}">
                {{ $trainer['first_name'] ?? '' }} 
                {{ $trainer['last_name'] ?? '' }}
                </option>
                @endforeach
            </select>
        </div>             
        <div class="d-flex flex-sm-row flex-column mb-2 mx-auto col-12">
            <select class="form-select me-2 mb-2 flex-grow-1" id= "training_feild" name="training_feild">
                <option selected>Training Feild</option>
                @foreach($training_feilds as $training_feild)
                <option value="{{$training_feild['id']}}">{{ $training_feild['name'] }}</option>
                @endforeach
            </select>
        </div>                
        <div class="form-floating">
            <textarea class="form-control" id="details" name="details" placeholder="Details" ></textarea >
            <label for="floatingInput">Details</label>
        </div>
        <button type="button" class="btn btn-light fst-italic mt-3 mb-1" onClick="recommend_name()">
            Click to set recommended name according to your inputs (editable)</button>
        <div class="form-floating">
            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Training Name" />
            <label for="floatingInput">Training Name</label>
        </div>
        <button type="submit" class="btn w-25 mx-auto mt-4 btn-primary bg-dark-blue text-light">Add</button> 
    </div>
</form>
<script>
    function recommend_name() {
        var name = document.getElementById("name");
        var feild = document.getElementById("training_feild").value;
        var trainer = document.getElementById("trainer").options[document.getElementById("trainer").selectedIndex].text;
        var semester = document.getElementById("semester").options[document.getElementById("semester").selectedIndex].text;
        name.value = feild + "-" + trainer + "/" + semester;
    }
</script>

@endsection