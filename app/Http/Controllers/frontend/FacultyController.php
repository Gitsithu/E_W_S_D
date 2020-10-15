<?php

namespace App\Http\Controllers\frontend;
use DB;
use Auth;
use App\faculty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Carbon\Traits\Date;

class FacultyController extends Controller
{
    //
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check the user's login
        $loginUser = Auth::user();

        // condition the status of faculty and selected that is equal to null
        if (!($loginUser)){
            $status=1;
        //    $objs= faculty::where('deleted_at', NULL)->get();
           $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
           
        }
        
        // if user is role_id 4 also condition the status of faculty and selected that is equal to 1
        else{
            $loginUser->role_id==4;
            
            $status = 1;
            // $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
            
        }
                // to count the number of faculty
                $faculty_count_raws = DB::select('select count(id) AS faculty_count from faculty');
    
                if (isset($faculty_count_raws) && count($faculty_count_raws)>0) {
                    $faculty_count = $faculty_count_raws[0]->faculty_count;
                } else {
                    $faculty_count = 0;
                }
               
                // Start - Searching User Count except Adimin (Role 2) Process
                // to count the numbers of marketing coordinator
                $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 3');
    
                if (isset($user_count_raw) && count($user_count_raw)>0) {
                    $user_count = $user_count_raw[0]->user_count;
                } else {
                    $user_count = 0;
                }

                // to count the number of students
                $user_count_raws= DB::select('select count(id) AS user_counts from users where role_id = 4');
    
                if (isset($user_count_raws) && count($user_count_raws)>0) {
                    $user_counts = $user_count_raws[0]->user_counts;
                } else {
                    $user_counts = 0;
                }
                
                // to count the number of selected contributions
                $submission_count_raws = DB::select('select count(id) AS submission_counts from submission where status = 1');
    
                if (isset($submission_count_raws) && count($submission_count_raws)>0) {
                    $submission_counts = $submission_count_raws[0]->submission_counts;
                } else {
                    $submission_counts = 0;
                }
               
                   
        
       return view('welcome')
       ->with('objs',$objs)
       ->with('faculty_count',$faculty_count)
       ->with('user_count',$user_count)
       ->with('user_counts',$user_counts)
       ->with('submission_counts',$submission_counts);

     
    }
   
    public function faculty()
    {
        //
        $loginUser = Auth::user();

        // to condition the status of faculty and selected that is equal to 1
        if (!($loginUser)){
            $status=1;
            $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
            WHERE status = ' .$status.' AND deleted_at Is Null');
           
           

        }
        
        else{
            // if role_id is 4 but also condition the status of faculty and selected that is equal to 1
            $loginUser->role_id==4;
            
            $status=1;
            $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
           
        }

        
        
        
       return view('frontend/faculty')
       
       ->with('objs',$objs);
    }
    public function guest()
    {
        //
        $loginUser = Auth::user();

        // condition the status of faculty and selected that is equal to 1
        if (!($loginUser)){
            $status=1;
           $objs= faculty::where('deleted_at', NULL)->get();
           $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
           
           

        }
        
        else{
            // if role_id is 5 but aslo condition the status of faculty and selected that is equal to 1
            $loginUser->role_id==5;
            
            $status = 1;
            $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
            
        }

        // to count the number of faculty
        $faculty_count_raws = DB::select('select count(id) AS faculty_count from faculty');
    
        if (isset($faculty_count_raws) && count($faculty_count_raws)>0) {
            $faculty_count = $faculty_count_raws[0]->faculty_count;
        } else {
            $faculty_count = 0;
        }
       
        // Start - Searching User Count except Adimin (Role 2) Process
        // to count the numbers of marketing coordinator
        $user_count_raw = DB::select('select count(id) AS user_count from users where role_id = 3');

        if (isset($user_count_raw) && count($user_count_raw)>0) {
            $user_count = $user_count_raw[0]->user_count;
        } else {
            $user_count = 0;
        }

        // to count the numbers of student
        $user_count_raws= DB::select('select count(id) AS user_counts from users where role_id = 4');

        if (isset($user_count_raws) && count($user_count_raws)>0) {
            $user_counts = $user_count_raws[0]->user_counts;
        } else {
            $user_counts = 0;
        }

        // to count the numbers of selected contributions
        $submission_count_raws = DB::select('select count(id) AS submission_counts from submission where status = 1');

        if (isset($submission_count_raws) && count($submission_count_raws)>0) {
            $submission_counts = $submission_count_raws[0]->submission_counts;
        } else {
            $submission_counts = 0;
        }    
        
       return view('guest')
       ->with('objs',$objs)
       ->with('faculty_count',$faculty_count)
       ->with('user_count',$user_count)
       ->with('user_counts',$user_counts)
       ->with('submission_counts',$submission_counts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {     
        $id = Crypt::decrypt($id);  
    

        // to select the id which is eqaul to the enter id  
       $objs=DB::select('select * from faculty where id='.$id);

       // In order to select id, it use left join 
       $academic=DB::select('SELECT a.*  from
                            academic_year as a left join faculty as f
                            on a.id=f.academic_year_id where f.id='.$id);
         if(Auth::user()!= Null){
         
         // to count the id from acacdemic table but also condition that the first closure date date is greater the today date
         // not the show the button if the first closure date is greater than today date
         $d_date=DB::select('SELECT count(a.id) as count_id from academic_year as a 
                            JOIN faculty as f
                            on a.id=f.academic_year_id
                            where a.first_closure_date > curdate() and f.id='.$id);
          
        
         $loginUser = Auth::user();
         $loginUserId = $loginUser->id;
        
         // to only select the role id 4 respective faculty it join with faculty table but also eqaul with the login user id
         $objss = DB::select('SELECT u.faculty_id
         FROM 
         users AS u 
         JOIN faculty AS f
         ON u.faculty_id = f.id
         WHERE u.role_id = " 4 " and u.id='.$loginUserId);
         
        return view('frontend.submission.create')
            ->with('objs', $objs)
            ->with('objss',$objss)
            ->with('academic',$academic)
            // ->with('stud',$stud)
            ->with('d_date',$d_date);
         }
         else{
            return view('frontend.submission.create')
            ->with('objs', $objs)
            ->with('academic',$academic);
         }        
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

