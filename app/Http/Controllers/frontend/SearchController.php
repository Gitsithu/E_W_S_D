<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\faculty;
use Illuminate\Support\Facades\Input;
class SearchController extends Controller
{
    //
    public function index()
    {
        // queary name
        
        $q = Input::get ( 'q' );

        // to search data that has added to faculty
        $faculty = Faculty::where('type','LIKE','%'.$q.'%')->get();
        if(count($faculty) > 0)
            return view('search')->withDetails($faculty)->withQuery ( $q );
        else return view ('search')->withMessage('No details found. Try to search again !');
    }

}
