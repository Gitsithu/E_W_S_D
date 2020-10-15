<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class faculty extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at']; 
    protected $table = 'faculty';
    protected $fillable = ['id','type','academic_year_id','user_id','status'];
}
