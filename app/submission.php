<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class submission extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'submission';
    protected $fillable = ['id','academic_year_id','faculty_id','user_id','article','image','submission_date','update_date','status'];
}
