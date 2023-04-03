<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{

    protected $table = 'classroom';
    public $timestamps = true;
    protected $fillable=['Name_class','Name_class_en','Grade_id'];

    public function Grade()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }

}
