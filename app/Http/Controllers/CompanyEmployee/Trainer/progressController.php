<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\Training;
use App\Models\Progress;

class progressController extends Controller
{
    public function show($id,$trainee_id){//id is trainer id
        $trainer=CompanyEmployee::find($id);
        $trainee=Student::find($trainee_id);//get this student
        $trainingID =$trainee->training_id;//ex : 8 -get student training
     
        $trainers=CompanyEmployee::all();
        
        $allTrainings=$trainer->trainings()->where('id', $trainingID)->get();
        $traineeProgress =Progress::where('student_id',$trainee_id)->get();


        foreach ($allTrainings as $training) {
        
    
        return view('company_employee.trainer.trainees.progress',compact('trainer','trainers','trainee','training','traineeProgress'));
        }
    }

    public function add(Request $request, $id, $trainee_id)
    {
        $request->validate([
            'week' => 'required|string',
            'end_date' => 'required|date',
            'passed_hours' => 'required|integer|min:0|max:300',//300? there is a problem here try enter value above 40
            'absences_days' => 'required|integer',
            'note' => 'nullable|max:155|string',
        ]);
    
        $progress = new Progress();
        $progress->week = $request->input('week');
        $progress->end_date = $request->input('end_date');
        $progress->passed_hours = $request->input('passed_hours');
        $progress->absences_days = $request->input('absences_days');
        $progress->note = $request->input('note');
        $progress->student_id = $trainee_id;
        $progress->save();

        $request->session()->flash('success', 'Progress added successfully.');

        return redirect()->route('fill_traniee_progress', ['user_id' => $id, 'trainee_id' => $trainee_id]);
    }

    public function edit($id, $trainee_id, $progress_id)
    {
        $trainer = CompanyEmployee::findOrFail($id);
        $trainee = Student::findOrFail($trainee_id);
        $progress = Progress::findOrFail($progress_id);
        $trainingID =$trainee->training_id;//ex : 8 -get student training
        $allTrainings=$trainer->trainings()->where('id', $trainingID)->get();

        foreach ($allTrainings as $training) {
        
        return view('company_employee.trainer.trainees.edit_progress', compact('trainer', 'trainee', 'progress','training'));
    }
}
    public function update(Request $request, $id, $trainee_id, $progress_id)
{
    $request->validate([
        'week' => 'required|string',
        'end_date' => 'required|date',
        'passed_hours' => 'required|integer',
        'absences_days' => 'required|integer',
        'note' => 'nullable|max:155|string',
    ]);

    Progress::where('id',$progress_id)->update([
        'week' =>$request->week,
        'end_date' =>$request->end_date,
        'passed_hours' =>$request->passed_hours,
        'absences_days' =>$request->absences_days,
        'note' =>$request->note,
    ]);

    $request->session()->flash('success', 'Progress updated successfully.');

    return redirect()->route('fill_traniee_progress', ['user_id' => $id, 'trainee_id' => $trainee_id]);
    }

    public function destroy($id, $trainee_id, $progressId)
    {
        // dd($progressId,$trainerId, $traineeId);
        Progress::where('id', $progressId)->delete();

        return redirect(route('fill_traniee_progress',['user_id'=> $id, 'trainee_id' => $trainee_id]))->with('error', 'Progress not found');
    }
    
    
}
