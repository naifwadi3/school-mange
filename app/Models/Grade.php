<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $table = 'Grades';
    public $timestamps = true;
    protected $fillable=['Name','Name_en','Notes'];

    public function Sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
}
