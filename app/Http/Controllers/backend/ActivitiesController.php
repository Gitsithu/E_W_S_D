<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class ActivitiesController extends Controller
{
    public function index()
    {
        // to show sum of duplicate
        $loginUser = Auth::user();
        $loginUserId = $loginUser->id;
       $objs=DB::select('SELECT DISTINCT user_id,
                            date,user_role,
                            count(log.id) AS count 
                            FROM log
                            INNER JOIN users 
                            On log.user_id=users.id 
                            GROUP BY log.date,log.user_id,log.user_role');
     
       return view('backend.log.activities')
       
        ->with('objs',$objs);
    
    }
}