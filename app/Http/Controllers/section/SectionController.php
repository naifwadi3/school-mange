<?php

namespace App\Http\Controllers\section;
use App\Http\Controllers\Controller;
use App\Models\section;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Http\Requests\StoreSections;
use App\Models\teacherss;
use App\Models\teacher_section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades=Grade::with(['Sections'])->get();
        $My_class=Classroom::all();
        $Sections=section::all();
        $list_Grades = Grade::all();
        $teacher=teacherss::all();
        $Sections->Status = 1;

        return view('pages.section.Sections', compact('Grades','list_Grades','Sections','My_class','teacher'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
  {

//     try {

//       $validated = $request->validated();
//       $Sections = new Section();

//     //   $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
//       $Sections->Grade_id = $request->Grade_id;
//       $Sections->Class_id = $request->Class_id;
//       $Sections->Status = 1;
//       $Sections->save();
//       toastr()->success(trans('messages.success'));

//       return redirect()->route('section');
//   }

//   catch (\Exception $e){
//       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
//   }
// return $request;
$Sections = section::create($request->all());
// $Section->teacherss::create()->attach($request->teacher_id);
// $ss=teacher_section::create($request->all());
return redirect()->route('section');

  }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */

    function update(StoreSections $request)
  {

    try {
      $validated = $request->validated();
      $Sections = Section::findOrFail($request->id);

      $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
      $Sections->Grade_id = $request->Grade_id;
      $Sections->Class_id = $request->Class_id;

      if(isset($request->Status)) {
        $Sections->Status = 1;
      } else {
        $Sections->Status = 2;
      }

      $Sections->save();
      toastr()->success(trans('messages.Update'));

      return redirect()->route('Sections.index');
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {

      section::findOrFail($request->id)->delete();
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('section');

    }

    public function getclasses($id)
      {
          $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

          return $list_classes;
      }
}
