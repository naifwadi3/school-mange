<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\sps;
use App\Models\GNS;
use App\Models\teacherss;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Teacher extends Component
{
    use WithFileUploads;

    public $successMessage = '';

    public $catchError,$updateMode = false,$photos,$show_table = true,$Parent_id;

    public $currentStep = 1,

        // Father_INPUTS
        $email,  $password,
        $name,$Name_en,
        $Specialization_id,
        $Gender_id,
        $Joining_Date,
        $Address;

        public function render()
        {
            return view('livewire.Teacher.add-teacher', [
                'sps' => sps::all(),
                'GNS' => GNS::all(),
                'teachers' =>teacherss::all(),

            ]);
}





    //firstStepSubmit
    public function firstStepSubmit()
    {
       $this->validate([
            'email' => 'required|unique:my_parents,Email,'.$this->id,
            'password' => 'required',
            'name' => 'required',
            'Name_en' => 'required',
            'Joining_Date' => 'required',
            'Address' => 'required',
            'Address' => 'required',
            'Gender_id' => 'required',
            'Specialization_id' => 'required',
        ]);

        $this->submitForm();

    }
public function showformadd(){
    $this->show_table = false;
}



public function submitForm(){

    // try {
        $teatcher = new teacherss();
        // Father_INPUTS
        $teatcher->email = $this->email;
        $teatcher->password = Hash::make($this->password);
        $teatcher->name = ['en' => $this->Name_en, 'ar' => $this->name];
        $teatcher->Joining_Date = $this->Joining_Date;
        $teatcher->Address = $this->Address;
        $teatcher->Gender_id = $this->Gender_id;
        $teatcher->Specialization_id = $this->Specialization_id;

        $teatcher->save();


        $this->successMessage = trans('messages.success');
        $this->clearForm();
        $this->currentStep = 1;
    }

    // catch (\Exception $e) {
    //     $this->catchError = $e->getMessage();
    // };

// }
//firstStepSubmit
public function firstStepSubmit_edit()
{
    $this->updateMode = true;

}
//clearForm
public function clearForm()
{
    $this->email = '';
    $this->password = '';
    $this->Name = '';
    $this->Name_en = '';
    $this->Joining_Date = '';
    $this->Address = '';
    $this->Gender_id = '';
    $this->Specialization_id ='';


}
public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $teatcher = teacherss::where('id',$id)->first();
        $this->email = $teatcher->email;
        $this->password = $teatcher->password;
        $this->name = $teatcher->getTranslation('name', 'ar');
        $this->Name_en = $teatcher->getTranslation('name', 'en');
        $this->Joining_Date =$teatcher->Joining_Date;
        $this->Address = $teatcher->Address;
        $this->Gender_id = $teatcher->Gender_id;
        $this->Specialization_id = $teatcher->Specialization_id;




    }

    public function delete($id){
        teacherss::findOrFail($id)->delete();
        return redirect()->to('/Teacher/teacher_Table');
    }












}
