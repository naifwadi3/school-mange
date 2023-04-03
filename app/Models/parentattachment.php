<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentattachment extends Model
{
    protected $fillable = ['file_name','parent_id'];
}
