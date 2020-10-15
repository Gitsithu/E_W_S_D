<?php

namespace App\Http\Controllers\backend;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiddleController extends Controller
{

    // 
    public function contribution()
    {
        $header_condition = DB::table('submission') 
                    ->wherenotNull('id')
                    ->first();
        if($header_condition==null){
            return redirect()->route('pre_report/contribution');
        }
        else{
            return redirect()->route('report/contribution');
        }
    }

    public function contributor()
    {
        $header_condition = DB::table('submission') 
                    ->wherenotNull('id')
                    ->first();

                    if($header_condition==null){
                        return redirect()->route('pre_report/contributor');
                    }
                    else{
                        return redirect()->route('report/contributor');
                    }
    }

    public function percentage()
    {
        $header_condition = DB::table('submission') 
                    ->wherenotNull('id')
                    ->first();

                    if($header_condition==null){
                        return redirect()->route('pre_report/percentage');
                    }
                    else{
                        return redirect()->route('report/percentage');
                    }
    }

    public function dashboard()
    {
        $header_condition = DB::table('submission') 
                    ->wherenotNull('id')
                    ->first();
        if($header_condition==null){
            return redirect()->route('pre_dashboard');
        }
        else{
            return redirect()->route('dashboard');
        }
    }
}
