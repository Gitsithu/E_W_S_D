<?php

namespace App\Http\Controllers\frontend;
use Auth;
use DB;
use Carbon\Carbon;
use submission;
use Mail;
use App\Mail\SubmissionMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB as FacadesDB;

class SubmissionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $loginUser = Auth::user();

        
        $loginUserId = $loginUser->id;
        
        // to show respective data of submission,faculty and users tables but also qual to login user id
        $submissions = DB::select('SELECT s.*,u.name AS user_name,f.type AS faculty_type, a.s_academic_year as s_academic_year,a.e_academic_year as e_academic_year  
                            FROM 
                            submission AS s 
                            JOIN users AS u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            JOIN academic_year as a
                            ON f.academic_year_id=a.id
                            WHERE s.user_id = '. $loginUserId);
       
        
         // to condition where the finnal closure date is greater than today date 
         // not the show the button if the final closure date is greater than today date
         $closure = DB::select('SELECT COUNT(a.id) as academic_id from academic_year as a
                                LEFT JOIN submission as s
                                ON a.id = s.academic_year_id
                                where a.final_closure_date > curdate()');

                return view('frontend.submission.index')
                ->with('submissions', $submissions)
                ->with('closure', $closure);
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to show the data of both faculty and academic, the two tables join in foreign key
        $objs=DB::select('SELECT f.*, a.s_academic_year as academic_year from
        faculty as f join academic_year as a
        ON f.academic_year_id=a.id');

        
        return view('frontend.submission.create')
            ->with('objs', $objs);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // to validate the form
        
        $this->validate($request,[
            'article' => 'required|mimes:doc,docx,odt',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
            
        ]);
        $loginUser = Auth::user();

       

            
            $academic_year_id = $request->input('academic_year_id');
            $faculty_id = $request->input('faculty_id');
            $user_id = $loginUser->id;  
            
            // create the article file path to store the submission articles
            $article = $request->file('article');
            $new_name = rand() . '.' . $article->getClientOriginalExtension();
            $article->move(public_path('articles'), $new_name);
            $article_file = "/articles/" . $new_name;
            
            // create the images file path to store the submission images 
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $image_file = "/images/" . $new_name;
            $submission_date =date('Y-m-d');
            $addition = Carbon::now()->add(14, 'day');
            $created_at = date("Y-m-d H:i:s");                
            
            DB::insert('insert into submission (academic_year_id,faculty_id,user_id,article,image,submission_date,add_date,created_at) values(?,?,?,?,?,?,?,?)',[$academic_year_id,$faculty_id,$user_id, $article_file,$image_file,$submission_date,$addition,$created_at]);
            $loginUser=Auth::user();
            $c_mail= DB::select('SELECT u.email FROM users AS u 
                        WHERE u.role_id = "3" and u.faculty_id ='.$faculty_id);
            $comment = '* Please check and give comment your appropriate student contributions*';
            
              

    
                Mail::to($c_mail)->send(new SubmissionMail($comment));
               
                $successmessage = "Success, submission successfully !";
                $request->session()->flash('success', $successmessage);
               
                return redirect()->action(
                    'frontend\SubmissionController@index');  
                
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
        // to select the comment column where it is also equal to user's input id 
        
        $submissions =DB::select('SELECT comment from submission where id ='.$id);
        return view('frontend.submission.comment', ['submissions' => $submissions]);
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
        // to compare the id of submission and user's input id
        $submission = DB::table('submission')->where('id', $id)->first();
        return view('frontend.submission.edit', ['submission' => $submission]);
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
        // to validate the form
        $this->validate($request, [
           
            'article' => 'mimes:doc,docx,odt',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $update_date =date('Y-m-d');
        $updated_at = date("Y-m-d H:i:s");
        

        try{
            // create the article and images path to store the submission articles and images
            $article = $request->file('article');
            $image = $request->file('image');
            
            // create the article path to store the submission articles
            if ($article !=  null and $image == null){
                
                $new_name = rand() . '.' . $article->getClientOriginalExtension();
                $article->move(public_path('articles'), $new_name);
                $article_file = "/articles/" . $new_name;

                DB::update('update submission set  article = ?, update_date = ?,  updated_at = ? where id = ?', [$article_file,$update_date,$updated_at,$id]);
                
            }
            // create the images path to store the submission images
            else if($image != null and $article == null){
               
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_name);
                $image_file = "/images/" . $new_name;

                DB::update('update submission set  image = ?, update_date = ?,  updated_at = ? where id = ?', [$image_file,$update_date,$updated_at,$id]);
               
            }
            // create the article and images path to store the submission articles and images
            else if($article != null  and $image != null){
                $new_name = rand() . '.' . $article->getClientOriginalExtension();
                $article->move(public_path('articles'), $new_name);
                $article_file = "/articles/" . $new_name;
                $new_nam = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $new_nam);
                $image_file = "/images/" . $new_nam;

                DB::update('update submission set  article = ?, image = ?, update_date = ?, updated_at = ? where id = ?', [$article_file,$image_file,$update_date,$updated_at,$id]);
            }
            else{
                DB::update('update submission set update_date = ?, updated_at = ? where id = ?', [$update_date,$updated_at,$id]);
            }

            // to alert where it sucess or not
            $smessage = 'Success, submission updated successfully ...!';
            $request->session()->flash('success', $smessage);

            // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'frontend\SubmissionController@index'
            );
        }
            catch(Exception $e){
            
            // to show alert when it fail
            $smessage = 'Fail, Error in your submission updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'frontend\SubmissionController@index'
            );
        }


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
