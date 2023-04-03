<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Translatable\HasTranslations;

class studant extends Authenticatable
{
    use SoftDeletes;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];

    // علاقة بين الطلاب والمراحل الدراسية لجلب اسم المرحلة في جدول الطلاب

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

    // علاقة بين الطلاب والانواع لجلب اسم النوع في جدول الطلاب

    public function gender()
    {
        return $this->belongsTo('App\Models\GNS', 'gender_id');
    }
    // علاقة بين الطلاب الصفوف الدراسية لجلب اسم الصف في جدول الطلاب

    public function classroom()
    {
        return $this->belongsTo('App\Models\classroom', 'Classroom_id');
    }
    // علاقة بين الطلاب الاقسام الدراسية لجلب اسم القسم  في جدول الطلاب


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }
     // علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
     public function Images()
     {
         return $this->morphMany('App\Models\image', 'imageable');
     }
    public function Nationality()
    {
        return $this->belongsTo('App\Models\nationalities', 'nationalitie_id');
    }
    public function myparent()
    {
        return $this->belongsTo('App\Models\My_parent', 'parent_id');
    }

    public function attendance()
    {
        return $this->hasMany('App\Models\attendance', 'student_id');
    }
}
