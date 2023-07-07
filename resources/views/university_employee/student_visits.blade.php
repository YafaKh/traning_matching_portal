@extends('all_users.master')
@section('navbar')
    @if($user->company_employee_role_id==2)
        @include('university_employee.supervisor.navbar')
    @else
        @include('university_employee.coordinator.navbar')
    @endif
@endsection

@section('content')
<div class="px-5">
    {{-- students table --}}
    <div class="table-responsive col-lg-9 mx-auto mt-5 shadow bg-light">
        <table class="table">
            <thead class="bg-dark-blue text-light">
                <tr>
                    <td colspan="3" class="py-4 px-5 fs-5 fw-bold">
                        {{$student->first_name_en}} {{$student->last_name_en}}
                        @if($user->company_employee_role_id!=1)
                        <a href="{{route('fill_visit_form',['user_id' => $user->id, 'student_id' => $student->id])}}"
                        class="btn bg-sand px-1 py-0 shadow ms-3" >
                        <i class="bi bi-plus-square fs-5"></i></a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="col" class="ps-5">Date</th>
                    <th scope="col">Contact way</th>
                    <th scope="col">Report</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                @foreach($visits as $visit)
                <tr>
                    <td class="ps-5 fw-bold">
                    @if($user->company_employee_role_id!=1)
                    <a href="{{route('edit_visit', ['user_id' => $user->id, 'student_id' => $student->id, 'visit_id'=>$visit->id])}}">
                    {{$visit->visit_date}}, {{$visit->visit_time}}</a>
                    @else
                        {{$visit->visit_date}}, {{$visit->visit_time}}
                    @endif
                        
                    </td>
                    <td>
                        @if($visit['report']==1)
                        Online
                        @else
                        On-site 
                        @endif
                    </td>
                    <td style="vertical-align: top;">
                        <a class="btn btn-link txt-sm" data-bs-toggle="collapse" href="#report{{$visit['id']}}" 
                            aria-expanded="false" aria-controls="#report{{$visit['id']}}">Show more</a>
                        <div class="collapse" id="report{{$visit['id']}}">
                            <div class="card card-body" style="width: 300px;">
                                {{$visit['report']}}
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="text-center">

</div>
@endsection
