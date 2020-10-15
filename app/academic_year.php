<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class academic_year extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
  
    protected $table = 'academic_year';
    protected $fillable = ['id','s_academic_year','e_academic_year','first_closure_date','final_closure_date','status'];
}
