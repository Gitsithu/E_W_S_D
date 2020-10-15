<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;


class DashboardController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   
    


   public function index()
   {
    if (Auth::check()) {
            
      // Start - Searching faculty Count Process
      // to count the number of faculty
          $faculty_count_raw = DB::select('select count(id) AS faculty_count from faculty where status = 1');

          if (isset($faculty_count_raw) && count($faculty_count_raw)>0) {
              $faculty_count = $faculty_count_raw[0]->faculty_count;
          } else {
              $faculty_count = 0;
          }

          // to count the total number of user
          $total_count_raw = DB::select('select count(id) AS total_count from users where status = 1');

          if (isset($total_count_raw) && count($total_count_raw)>0) {
              $total_count = $total_count_raw[0]->total_count;
          } else {
              $total_count = 0;
          }
         
          // to count the number of marketing manager
          $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 2');
    
          if (isset($user_count_raw) && count($user_count_raw)>0) {
              $user_count = $user_count_raw[0]->user_count;
          } else {
              $user_count = 0;
          }

          // to count the number of marketing coordinator
          $user_count_raws = DB::select('select count(id) AS user_counts from users where role_id = 3');
    
          if (isset($user_count_raws) && count($user_count_raws)>0) {
              $user_counts = $user_count_raws[0]->user_counts;
          } else {
              $user_counts = 0;
          }

          // to count the number of student 
          $user_count_rawss = DB::select('select count(id) AS user_countss from users where role_id = 4');
    
          if (isset($user_count_rawss) && count($user_count_rawss)>0) {
              $user_countss = $user_count_rawss[0]->user_countss;
          } else {
              $user_countss = 0;
          }

          // to count the number of guests 
          $user_count_rawsss = DB::select('select count(id) AS user_countsss from users where role_id = 5');
    
          if (isset($user_count_rawsss) && count($user_count_rawsss)>0) {
              $user_countsss = $user_count_rawsss[0]->user_countsss;
          } else {
              $user_countsss = 0;
          }
          
          // to count the number of users' submission
          $submission_count_raw = DB::select('select count(id) AS submission_count from submission');
    
          if (isset($submission_count_raw) && count($submission_count_raw)>0) {
              $submission_count = $submission_count_raw[0]->submission_count;
          } else {
              $submission_count = 0;
          }

          // to count the number of users' selected contributions
          $submission_count_raws = DB::select('select count(id) AS submission_counts from submission where status = 1');
    
          if (isset($submission_count_raws) && count($submission_count_raws)>0) {
              $submission_counts = $submission_count_raws[0]->submission_counts;
          } else {
              $submission_counts = 0;
          }

          $loginUser = Auth::user();
          $loginUserId = $loginUser->id ;  
           
          // to count the number of contributions upon login user id for coordinator role
          $submission_count_rawss = DB::select('SELECT count(s.id) AS submission_countss 
                               FROM 
                               submission AS s 
                               JOIN users AS u
                               ON s.faculty_id = u.faculty_id
                               JOIN faculty AS f
                               ON s.faculty_id = f.id
                               where u.id='.$loginUserId);
            if (isset($submission_count_rawss)&& count($submission_count_rawss)>0) {
                $submission_countss = $submission_count_rawss[0]->submission_countss;
            } else {
                $submission_countss = 0;
            } 

            // to count the number of contributions
            $registrations_count_raw = DB::select('SELECT count(s.id) as counting,f.type as faculty_type
                               FROM 
                               submission AS s
                               JOIN faculty AS f
                               ON s.faculty_id = f.id
                               Group By f.type ');
            
            
            $faculties = DB::select('select * from faculty');

            
                                
          return view('backend.dashboard')
          ->with('faculties', $faculties)
          ->with('registrations_count_raw', $registrations_count_raw)
          ->with('faculty_count', $faculty_count)
          ->with('total_count', $total_count)
          ->with('user_count', $user_count)
          ->with('user_counts', $user_counts)
          ->with('user_countss', $user_countss)
          ->with('user_countsss', $user_countsss)
          ->with('submission_count', $submission_count)
          ->with('submission_counts', $submission_counts)
          ->with('submission_countss', $submission_countss);
          
         
      }
      else{
          return redirect()->route('login');
      }


   }
   

}

    


//    public function search($type = null)
//    {
//        if($type == null || $type == 0){
           
//            $registrations_count_raw = DB::select('SELECT count(s.id) as counting
//                                FROM 
//                                submission AS s
//                                JOIN faculty AS f
//                                ON s.faculty_id = f.id');
//             if (isset($registrations_count_raw)&& count($registrations_count_raw)>0) {
//                     $counting = $registrations_count_raw[0]->counting;
//                 } else {
//                     $counting = 0;
//                 } 

//                 // Start - Searching faculty Count Process
//       // to count the number of faculty
//           $faculty_count_raw = DB::select('select count(id) AS faculty_count from faculty where status = 1');

//           if (isset($faculty_count_raw) && count($faculty_count_raw)>0) {
//               $faculty_count = $faculty_count_raw[0]->faculty_count;
//           } else {
//               $faculty_count = 0;
//           }

//           // to count the total number of user
//           $total_count_raw = DB::select('select count(id) AS total_count from users where status = 1');

//           if (isset($total_count_raw) && count($total_count_raw)>0) {
//               $total_count = $total_count_raw[0]->total_count;
//           } else {
//               $total_count = 0;
//           }
         
//           // to count the number of marketing manager
//           $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 2');
    
//           if (isset($user_count_raw) && count($user_count_raw)>0) {
//               $user_count = $user_count_raw[0]->user_count;
//           } else {
//               $user_count = 0;
//           }

//           // to count the number of marketing coordinator
//           $user_count_raws = DB::select('select count(id) AS user_counts from users where role_id = 3');
    
//           if (isset($user_count_raws) && count($user_count_raws)>0) {
//               $user_counts = $user_count_raws[0]->user_counts;
//           } else {
//               $user_counts = 0;
//           }

//           // to count the number of student 
//           $user_count_rawss = DB::select('select count(id) AS user_countss from users where role_id = 4');
    
//           if (isset($user_count_rawss) && count($user_count_rawss)>0) {
//               $user_countss = $user_count_rawss[0]->user_countss;
//           } else {
//               $user_countss = 0;
//           }

//           // to count the number of guests 
//           $user_count_rawsss = DB::select('select count(id) AS user_countsss from users where role_id = 5');
    
//           if (isset($user_count_rawsss) && count($user_count_rawsss)>0) {
//               $user_countsss = $user_count_rawsss[0]->user_countsss;
//           } else {
//               $user_countsss = 0;
//           }
          
//           // to count the number of users' submission
//           $submission_count_raw = DB::select('select count(id) AS submission_count from submission');
    
//           if (isset($submission_count_raw) && count($submission_count_raw)>0) {
//               $submission_count = $submission_count_raw[0]->submission_count;
//           } else {
//               $submission_count = 0;
//           }

//           // to count the number of users' selected contributions
//           $submission_count_raws = DB::select('select count(id) AS submission_counts from submission where status = 1');
    
//           if (isset($submission_count_raws) && count($submission_count_raws)>0) {
//               $submission_counts = $submission_count_raws[0]->submission_counts;
//           } else {
//               $submission_counts = 0;
//           }

//           $loginUser = Auth::user();
//           $loginUserId = $loginUser->id ;  
           
//           $submission_count_rawss = DB::select('SELECT count(s.id) AS submission_countss 
//                                FROM 
//                                submission AS s 
//                                JOIN users AS u
//                                ON s.faculty_id = u.faculty_id
//                                JOIN faculty AS f
//                                ON s.faculty_id = f.id
//                                where u.id='.$loginUserId);
//             if (isset($submission_count_rawss)&& count($submission_count_rawss)>0) {
//                 $submission_countss = $submission_count_rawss[0]->submission_countss;
//             } else {
//                 $submission_countss = 0;
//             } 
//        }
//        else{

//         // to count the number of contributions
//            $registrations_count_raw = DB::select('SELECT count(s.id) as counting
//                                FROM 
//                                submission AS s 
//                                JOIN faculty AS f
//                                ON s.faculty_id = f.id
//                                WHERE s.faculty_id ='.$type );
//             if (isset($registrations_count_raw)&& count($registrations_count_raw)>0) {
//                 $counting = $registrations_count_raw[0]->counting;
//             } else {
//                 $counting = 0;
//             }

//              // Start - Searching faculty Count Process
//         // to count the number of faculty
//           $faculty_count_raw = DB::select('select count(id) AS faculty_count from faculty where status = 1');

//           if (isset($faculty_count_raw) && count($faculty_count_raw)>0) {
//               $faculty_count = $faculty_count_raw[0]->faculty_count;
//           } else {
//               $faculty_count = 0;
//           }

//           // to count the total number of user
//           $total_count_raw = DB::select('select count(id) AS total_count from users where status = 1');

//           if (isset($total_count_raw) && count($total_count_raw)>0) {
//               $total_count = $total_count_raw[0]->total_count;
//           } else {
//               $total_count = 0;
//           }
         
//           // to count the number of marketing manager
//           $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 2');
    
//           if (isset($user_count_raw) && count($user_count_raw)>0) {
//               $user_count = $user_count_raw[0]->user_count;
//           } else {
//               $user_count = 0;
//           }

//           // to count the number of marketing coordinator
//           $user_count_raws = DB::select('select count(id) AS user_counts from users where role_id = 3');
    
//           if (isset($user_count_raws) && count($user_count_raws)>0) {
//               $user_counts = $user_count_raws[0]->user_counts;
//           } else {
//               $user_counts = 0;
//           }

//           // to count the number of student 
//           $user_count_rawss = DB::select('select count(id) AS user_countss from users where role_id = 4');
    
//           if (isset($user_count_rawss) && count($user_count_rawss)>0) {
//               $user_countss = $user_count_rawss[0]->user_countss;
//           } else {
//               $user_countss = 0;
//           }

//           // to count the number of guests 
//           $user_count_rawsss = DB::select('select count(id) AS user_countsss from users where role_id = 5');
    
//           if (isset($user_count_rawsss) && count($user_count_rawsss)>0) {
//               $user_countsss = $user_count_rawsss[0]->user_countsss;
//           } else {
//               $user_countsss = 0;
//           }
          
//           // to count the number of users' submission
//           $submission_count_raw = DB::select('select count(id) AS submission_count from submission');
    
//           if (isset($submission_count_raw) && count($submission_count_raw)>0) {
//               $submission_count = $submission_count_raw[0]->submission_count;
//           } else {
//               $submission_count = 0;
//           }

//           // to count the number of users' selected contributions
//           $submission_count_raws = DB::select('select count(id) AS submission_counts from submission where status = 1');
    
//           if (isset($submission_count_raws) && count($submission_count_raws)>0) {
//               $submission_counts = $submission_count_raws[0]->submission_counts;
//           } else {
//               $submission_counts = 0;
//           }


//         $loginUser = Auth::user();
//         $loginUserId = $loginUser->id ;  
         
//         //
//         $submission_count_rawss = DB::select('SELECT count(s.id) AS submission_countss 
//                              FROM 
//                              submission AS s 
//                              JOIN users AS u
//                              ON s.faculty_id = u.faculty_id
//                              JOIN faculty AS f
//                              ON s.faculty_id = f.id
//                              where u.id='.$loginUserId);
//           if (isset($submission_count_rawss)&& count($submission_count_rawss)>0) {
//               $submission_countss = $submission_count_rawss[0]->submission_countss;
//           } else {
//               $submission_countss = 0;
//           }
           
       

//        }
//        $faculties = DB::select('select * from faculty');
       
//        return view('backend.dashboard')
//           ->with('faculties', $faculties)
//           ->with('registrations_count_raw',$registrations_count_raw)
//           ->with('counting', $counting)
//           ->with('faculty_count', $faculty_count)
//           ->with('total_count', $total_count)
//           ->with('user_count', $user_count)
//           ->with('user_counts', $user_counts)
//           ->with('user_countss', $user_countss)
//           ->with('user_countsss', $user_countsss)
//           ->with('submission_count', $submission_count)
//           ->with('submission_counts', $submission_counts)
//           ->with('submission_countss', $submission_countss);
       
//    }


