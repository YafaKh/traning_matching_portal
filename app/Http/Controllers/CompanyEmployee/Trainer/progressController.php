<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function show($user_id,$trainee_id){
        $user=CompanyEmployee::find($user_id);
        $trainee=Student::find($trainee_id);//get this student
        $trainingID =$trainee->training_id;//ex : 8 -get student training
     
        $trainers=CompanyEmployee::all();
        
        $allTrainings=$user->trainings()->where('id', $trainingID)->get();
        $traineeProgress =Progress::where('student_id',$trainee_id)->get();


        foreach ($allTrainings as $training) {
        
    
        return view('company_employee.trainer.trainees.progress',compact('user','trainers','trainee','training','traineeProgress'));
        }
    }

    public function add(Request $request, $user_id, $trainee_id)
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

        return redirect()->route('fill_traniee_progress', ['user_id' => $user_id, 'trainee_id' => $trainee_id]);
    }

    public function edit($user_id, $trainee_id, $progress_id)
    {
        $user = CompanyEmployee::findOrFail($user_id);
        $trainee = Student::findOrFail($trainee_id);
        $progress = Progress::findOrFail($progress_id);
        $trainingID =$trainee->training_id;//ex : 8 -get student training
        $allTrainings=$user->trainings()->where('id', $trainingID)->get();

        foreach ($allTrainings as $training) {
        
        return view('company_employee.trainer.trainees.edit_progress', compact('user', 'trainee', 'progress','training'));
    }
}
    public function update(Request $request, $user_id, $trainee_id, $progress_id)
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

    return redirect()->route('fill_traniee_progress', ['user_id' => $user_id, 'trainee_id' => $trainee_id]);
    }

    public function destroy($user_id, $trainee_id, $progressId)
    {
        // dd($progressId,$trainerId, $traineeId);
        Progress::where('user_id', $progressId)->delete();

        return redirect(route('fill_traniee_progress',['user_id'=> $user_id, 'trainee_id' => $trainee_id]))->with('error', 'Progress not found');
    }
    
    
}
