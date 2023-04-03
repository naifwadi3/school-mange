<?php

namespace App\Http\Controllers\studan;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\studant;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public function index()
    {
        $students = Studant::onlyTrashed()->get();
        return view('pages.studant.Graduated.create',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages.studant.Graduated.create',compact('Grades'));
    }

    public function SoftDelete($request)
    {
        $students = studant::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            studant::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect()->route('Graduated.index');
    }

    public function ReturnData($request)
    {
        studant::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request)
    {
        studant::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
    }


}
