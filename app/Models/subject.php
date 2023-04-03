<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class subject extends Model
{
    use HasTranslations;
    // public $translatable = ['name'];
    protected $guarded=[];
    public $translatable=['name'];


public function classroom(){
    return $this->belongsTo('App\Models\classroom','classroom_id');
}

    public function teacher(){
        return $this->belongsTo('App\Models\teacherss','teacher_id');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade','grade_id');
    }


}
