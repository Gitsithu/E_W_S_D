<?php
namespace App\Http\Controllers\frontend;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\faculty;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class GuestController extends Controller
{
    public function guest(Request $request,$id){

        $id = Crypt::decrypt($id);

        // it join three tables of academic, users and faculty which is to show the submission status is 1 and faculty id is also equal to user's input id
        $guests = DB::select('SELECT s.*, u.name as user_name,f.type as faculty_type,a.s_academic_year as s_academic_year,a.e_academic_year as e_academic_year  
                            from submission as s
                            JOIN users as u
                            ON s.user_id=u.id
                            JOIN academic_year as a
                            ON s.academic_year_id=a.id
                            JOIN faculty as f 
                            ON s.faculty_id=f.id
                            where s.status="1" and f.id='. $id);
        
        // to count the number of users' selected contributions per faculty
        $submission_count_raws = DB::select('SELECT count(s.id) as contribution_counts from submission as s
                                             Join faculty as f
                                             on s.faculty_id=f.id
                                             where f.id='. $id);
     
        if (isset($submission_count_raws) && count($submission_count_raws)>0) {
            $contribution_counts = $submission_count_raws[0]->contribution_counts;
        } else {
            $contribution_counts = 0;
        }
        
        // to count the number of student's contributions per faculty
        $submission_count_rawss = DB::select('SELECT count(s.user_id) as contribution_countss from submission as s
                                             Join faculty as f
                                             on s.faculty_id=f.id
                                             JOIN users as u
                                             on s.user_id=u.id
                                             where f.id='. $id);
    
        if (isset($submission_count_rawss) && count($submission_count_rawss)>0) {
            $contribution_countss = $submission_count_rawss[0]->contribution_countss;
        } else {
            $contribution_countss = 0;
        }
        
        
            return view('frontend.guest.index')
            ->with('guests',$guests)
            ->with('contribution_counts',$contribution_counts)
            ->with('contribution_countss',$contribution_countss);
    }

    public function faculty()
    {
        //
        $loginUser = Auth::user();

        // to select the faculty status that is equal to 1 and also deleted is null
        if (!($loginUser)){
            $status=1;
            $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
            WHERE status = ' .$status.' AND deleted_at Is Null');

        }
        
        //if the user is role id 5, to select the faculty status that is equal to 1 and also deleted is null
        else{
            $loginUser->role_id=5;
            
            $status=1;
            $objs= faculty::where('deleted_at', NULL)->get();
            $objs=DB::select('SELECT * from faculty
           WHERE status = ' .$status.' AND deleted_at Is Null');
           
        }
       return view('guest_faculty')
       
       ->with('objs',$objs);
    }

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
    public function show($id)
    {

        $id = Crypt::decrypt($id);
    // to select comment column from submission table
    
    $submissions =DB::select('SELECT comment from submission where id ='.$id);
    return view('frontend.guest.comment', ['submissions' => $submissions]);
    }

}