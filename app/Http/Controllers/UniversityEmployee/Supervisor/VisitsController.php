<?php

namespace App\Http\Controllers\UniversityEmployee\Supervisor;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\UniversityEmployee;
use App\Models\Student;
use App\Models\Visit;

class VisitsController extends Controller
{
        //filtering

     /**
     * list all visit formd
     */
    public function index($user_id, $student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();
        $visits = $student->visits; 

        return view('university_employee.student_visits',['user'=>$user, 'student'=>$student, 'visits' =>$visits]);
    }

    /**
     * Show the form for creating a new visit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id, $student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();
        return view('university_employee.supervisor.visit_forms.create',['user'=>$user, 'student'=>$student]);
    
    }

    /**
     * Store a newly created visit form in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id, $student_id)
    {
        $student = Student::where('id', $student_id)->first();
         // Validate the form input
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'visit_way' => 'required',
            'report' => 'nullable',
        ]);

        // Create a new visit
        $visit = Visit::create([
            'visit_date' => $validatedData['date'],
            'visit_time' => $validatedData['time'],
            'report' => $validatedData['report'],
            'contact_way' => $validatedData['visit_way'],
            'student_id' => $student_id,
        ]);

        return redirect()->route('student_visits', ['user_id' => $user_id, 'student_id'=>$student->id]);

    }

    /**
     * Show the form for editing the specified visit form.
     *
     * @param  int  $user_id
     * @param  int  $student_id
     * @param  int  $visit_id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id, $student_id, $visit_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();
        $visit = Visit::where('id', $visit_id)->first();

        return view('university_employee.supervisor.visit_forms.edit', ['user' => $user, 'student' => $student, 'visit' => $visit]);
    }

    /**
     * Update the specified visit form in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @param  int  $student_id
     * @param  int  $visit_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, $student_id, $visit_id)
    {
        $student = Student::where('id', $student_id)->first();
        $visit = Visit::where('id', $visit_id)->first();

        // Validate the form input
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'visit_way' => 'required|boolean',
            'report' => 'nullable',
        ]);

        // Update the visit form
        $visit->update([
            'visit_date' => $validatedData['date'],
            'visit_time' => $validatedData['time'],
            'report' => $validatedData['report'],
            'contact_way' => $validatedData['visit_way'],
            'student_id' => $student_id,
        ]);

        return redirect()->route('student_visits', ['user_id' => $user_id, 'student_id' => $student->id]);
    }
}
