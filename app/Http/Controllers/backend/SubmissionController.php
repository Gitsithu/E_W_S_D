<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;
use App\User;
use Zipper;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class SubmissionController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loginUser = Auth::user();

        // if user is role id 1 it select the data of submission, faculty and users tables
        if ($loginUser->role_id == 1){ 
            
            $submissions = DB::select('SELECT s.*,u.name AS user_name,f.type AS faculty_type, a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year  
                                FROM 
                                submission AS s 
                                JOIN users AS u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id
                                JOIN academic_year as a
                                ON s.academic_year_id=a.id'
                                );
                                return view('backend.submission.index')
                              ->with('submissions', $submissions);
      
                            }
         // if user is role id 2 it select the data of submission, faculty and users tables where also submission status is equal to 1
         elseif($loginUser->role_id == 2){
            $status = 1;
            $submissions = DB::select('SELECT s.*,u.name AS user_name,f.type AS faculty_type, a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year 
                            FROM 
                            submission AS s 
                            JOIN users AS u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            JOIN academic_year as a
                            ON s.academic_year_id=a.id
                            where s.status ='.$status );
        $final_date = DB::select('SELECT count(*) as zip from academic_year where curdate() > final_closure_date');
        
        return view('backend.submission.index')
           ->with('submissions', $submissions)
           ->with('final_date',$final_date);
         
        }

         
         else{
            
            $loginUserId = $loginUser->id ;  
           // to only select the data faculty,submission and usrs tables of respective user, it equal with the login user id
           $submissions = DB::select('SELECT s.*,u.name AS user_name,f.type AS faculty_type, a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year 
                                FROM 
                                submission AS s 
                                JOIN users AS u
                                ON s.faculty_id = u.faculty_id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id
                                JOIN academic_year as a
                                ON s.academic_year_id=a.id
                                where u.id='.$loginUserId);

           
           // to condition the intervel of 14 days to the submission date
         // not the show the button if today date is greater than submission date

         
           
           return view('backend.submission.index')
           ->with('submissions', $submissions)
           ;
           
            
        }
    
      
    }

    public function date($id)
    {
        
        $id = Crypt::decrypt($id);
        
           // to only select the data faculty,submission and usrs tables of respective user, it equal with the login user id
           // to only select the data faculty,submission and usrs tables of respective user, it equal with the login user id
           $actions = DB::select('SELECT s.*,u.name AS user_name,f.type AS faculty_type, a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year  
                                FROM 
                                submission AS s 
                                JOIN users AS u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id
                                JOIN academic_year as a
                                ON s.academic_year_id=a.id
                                where s.id ='.$id);

                           

        $comments = DB::select('SELECT add_date < curdate() as addition from submission where id ='.$id);

       

        return view('backend.submission.action')
           ->with('actions', $actions)
           ->with('comments', $comments);
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
        //
        $submissions =DB::select('SELECT comment from submission where id ='.$id);
        return view('backend.submission.comment', ['submissions' => $submissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);

        $submission = DB::table('submission')->where('id', $id)->first();
        return view('backend.submission.edit', ['submission' => $submission]);
       
    
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
        
        
       if ($comment = $request->input('comment')){
        $updated_at = date("Y-m-d H:i:s");

        
        DB::update('update submission set comment = ?, updated_at = ? where id = ?',[$comment,$updated_at,$id]);
       }
       else{
        $status = $request->input('status');
        $submission = DB::select('select * from submission where id='.$id);
        $article=$submission[0]->article;
        
        //The location of the file that we want to copy.
        $fileToCopy = public_path($article);
        
        //The file path that we want to copy it to.
        $sub=substr($article,strpos($article,'/',9));
        
        $destinationOfCopy = public_path('selected_article').$sub;
        
        //Copy the file using PHP's copy function.
        $success =copy($fileToCopy, $destinationOfCopy);
        
        //Check if the copy was successful.
        if($success){
            //Print out a message.
            echo $fileToCopy . ' was copied to ' . $destinationOfCopy;
        }
        
        $image=$submission[0]->image;
        
        $fileToCopy = public_path($image);
        
        //The file path that we want to copy it to.
        $sub=substr($image,strpos($image,'/',3));
      
        //The file path that we want to copy it to.
        $destinationOfCopy = public_path('selected_image').$sub;
        
        //Copy the file using PHP's copy function.
        $success = copy($fileToCopy, $destinationOfCopy);
        
        //Check if the copy was successful.
        if($success){
            //Print out a message.
            echo $fileToCopy . ' was copied to ' . $destinationOfCopy;
        }
        
        $updated_at = date("Y-m-d H:i:s");
        DB::update('update submission set status = ?, updated_at = ? where id = ?',[$status,$updated_at,$id]);
    }
        $successmessage = "Successfully Done ! ";
        $request->session()->flash('success', $successmessage);

        
        return redirect()->action(
            'backend\SubmissionController@index');
      
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


