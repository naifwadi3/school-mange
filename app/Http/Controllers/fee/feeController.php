<?php

namespace App\Http\Controllers\fee;

use App\Http\Controllers\Controller;
use App\Models\fee;
use App\Models\Grade;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class feeController extends Controller
{

    public function index()
    {

        $fees=fee::all();
        return view('pages.fees.index',compact('fees'));

    }


    public function create()
    {
        $Grades=Grade::all();
        return view('pages.fees.add',compact('Grades'));
    }


    public function store(Request $request)
    {
        try {

            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('fee.create');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $fee = fee::findorfail($id);
        $Grades = Grade::all();
        return view('pages.fees.edit',compact('fee','Grades'));
    }


    public function update(Request $request, $id)
    {
        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('fee.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            fee::findOrfail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('fee.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
    }

