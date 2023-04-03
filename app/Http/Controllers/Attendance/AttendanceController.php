<?php

namespace App\Http\Controllers\Attendance;
use App\Http\Controllers\Controller;

use App\Models\attendance;
use App\Models\Grade;
use App\Models\studant;
use App\Models\teacherss;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = teacherss::all();
        $students = studant::all();
        $attendance=attendance::all();
        return view('pages.Attendance.index',compact('Grades','list_Grades','teachers','students','attendance'));
    }

    public function show($id)
    {
        // $students = studant::with('attendance')->where('section_id',$id)->get();
$students=studant::all();
        return view('pages.Attendance.index',compact('students'));
    }

    public function store(Request $request)
    {
        try {
            $attendance=date('Y-m-d');

            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }

                Attendance::updateorcreate(
                    ['student_id'=> $studentid,
                    'attendence_date'=> $attendance
                ],[
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendence_date'=> date('Y-m-d'),
                    'attendence_status'=> $attendence_status
                ]);

            }

            toastr()->success(trans('messages.success'));
            return redirect()->back();

        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
