<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'section';
    public $timestamps = true;
    protected $fillable=['Name_Section','Grade_id','Class_id','Name_Section_en','Status'];


    public function My_class()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }


    // علاقة الاقسام مع المعلمين
   public function teachers()
   {
     return $this->belongsToMany('App\Models\Teacher','teacher_section');
   }
}
