<?php

namespace App\Http\Controllers\studan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\section;
use App\Models\studant;
use App\Models\GNS;
use App\Models\image;
use App\Models\Grade;
use App\Models\classroom;
use App\Models\My_parent;
use App\Models\Nationalities;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class studantso extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=studant::all();
        $Grades=grade::all();
        $bloods=Type_Blood::all();
        $relegeion=Religion::all();
        $my_classes=Grade::all();
        $nationals=Nationalities::all();
        $Genders=GNS::all();
        $parents=My_parent::all();
        return view('pages.studant.index',compact('students','Grades','bloods','relegeion','my_classes','nationals','Genders','parents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studant=studant::all();
        $Grades=Grade::all();
        $bloods=Type_Blood::all();
        $relegeion=Religion::all();
        $my_classes=grade::all();
        $nationals=Nationalities::all();
        $Genders=GNS::all();
        $parents=My_parent::all();
         return view('pages.studant.add',compact('studant','Grades','bloods','relegeion','my_classes','nationals','Genders','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        DB::beginTransaction();

        try {
            $students = new studant();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect()->route('studant.create');



        }

        catch (\Exception $e){
            // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Students=studant::all();
        $Grades=grade::all();
        $bloods=Type_Blood::all();
        $relegeion=Religion::all();
        $my_classes=Grade::all();
        $nationals=Nationalities::all();
        $Genders=GNS::all();
        $parents=My_parent::all();


        $Students =  studant::findOrFail($id);
        return view('pages.studant.edit',compact('Students','Grades','bloods','relegeion','my_classes','nationals','Genders','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $Edit_Students = studant::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('studant.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        studant::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('studant.index');
    }
    public function Get_classrooms($id){

        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
        return $list_classes;

    }
    public function Get_Sections($id){

        $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
        return $list_sections;
    }

    public function show( Request $request ,$id)
    {

        $Student=studant::findOrfail($id);
        $all=$Student->Images($id);
        $image=image::findOrfail($id);
        $image=Image::find($id);
        return view('pages.studant.show',compact('Student','all'));
        // return $Student;
        // dd($Student->Images($id));













    }


    public function Upload_attachment(Request $request)
    {
        if($request->hasfile('photos'))
        {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('studant.show',$request->student_id);
    }

    }

    public function Delete_Student($request)
    {

        studant::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('studant.index');
    }

    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show',$request->student_id);
    }

}







