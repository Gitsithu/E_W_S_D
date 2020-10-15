<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // to select data from submisison, academic year and users tables to join with their foreign key
       $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                        FROM 
                        submission AS s
                        JOIN academic_year AS a
                        ON s.academic_year_id = a.id
                        JOIN users as u
                        ON s.user_id = u.id
                        JOIN faculty AS f
                        ON s.faculty_id = f.id');

        // to count contribution with chart
        $registrations_count_raw = DB::select('SELECT count(s.id) as counting,f.type as faculty_type
                                FROM 
                                submission AS s
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users as u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id GROUP BY f.type');
            

        // to select data from faculty table
        $faculties = DB::select('select * from faculty');

        return view('backend.report.contribution')
        ->with('faculties', $faculties)
        ->with('registrations_count_raw', $registrations_count_raw)
        ->with('registrations', $registrations);
        }


        public function search($type = null)
        {   
        // if $type is null or 0, it select the data from submisison, academic year and users tables to join with their foreign key
        if($type == null || $type == 0){

        $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,f.type AS faculty_type 
                        FROM 
                        submission AS s
                        JOIN academic_year AS a
                        ON s.academic_year_id = a.id
                        JOIN faculty AS f
                        ON s.faculty_id = f.id');
                        
        // to count contribution with chart
        $registrations_count_raw = DB::select('SELECT count(s.id) as counting,f.type as faculty_type
                                    FROM 
                                    submission AS s
                                    JOIN faculty AS f
                                    ON s.faculty_id = f.id GROUP BY f.type');

        }
        else{
        // to select the data from submisison, academic year and users tables to join with their foreign key which submission faculty id is equal to null
        $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,f.type AS faculty_type 
                        FROM 
                        submission AS s 
                        JOIN academic_year AS a
                        ON s.academic_year_id = a.id
                        JOIN faculty AS f
                        ON s.faculty_id = f.id
                        WHERE s.faculty_id ='.$type );
        
        // to count contribution with chart
        $registrations_count_raw = DB::select('SELECT count(s.id) as counting,f.type as faculty_type
                                    FROM 
                                    submission AS s
                                    JOIN faculty AS f
                                    ON s.faculty_id = f.id
                                    WHERE s.faculty_id = ".$type." Group By f.type' );
        
            
        }

        // to select data from faculty
        $faculties = DB::select('select * from faculty');

        return view('backend.report.contribution')
        ->with('faculties', $faculties)
        ->with('registrations_count_raw', $registrations_count_raw)
        ->with('registrations', $registrations);
        }
        
    public function contributor()
    {
       // to select data from submisison, academic year and users tables to join with their foreign key
        $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                                FROM 
                                submission AS s
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users as u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id');
         // to count contribution with chart
         $registrations_count_raw = DB::select('SELECT count(s.user_id) as counting,f.type as faculty_type
                                FROM 
                                submission AS s
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users as u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id GROUP BY f.type');

            // to select data of users which is equal to role_id 4
            $users = DB::select('select * from users where role_id = 4');
                    
            return view('backend.report.contributor')
                ->with('users', $users)
                ->with('registrations_count_raw', $registrations_count_raw)
                ->with('registrations', $registrations);
    }

    public function search_1($type = null)
    {
        if($type == null || $type == 0){
            // if $type is null or 0, it select the data from submisison, academic year and users tables to join with their foreign key
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                                FROM 
                                submission AS s
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users as u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id');

        }
        else{
            // to select the data from submisison, academic year and users tables to join with their foreign key which submission faculty id is equal to null
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                                FROM 
                                submission AS s 
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users AS u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id
                                WHERE s.user_id ='.$type );

        }
        

        $users = DB::select('select * from users where role_id = 4');
        
        return view('backend.report.contributor')
            ->with('users', $users)
            ->with('registrations', $registrations);
    }
    public function percentage()
    {
     // to select the data from submisison, academic year and users tables to join with their foreign key
    // then the data is output in percentage 
    $registrations = DB::select('SELECT count(s.id) / 100 as percent,f.type as faculty_type
                    from submission as s
                    JOIN academic_year AS a
                    ON s.academic_year_id = a.id
                    JOIN users as u
                    ON s.user_id = u.id
                    JOIN faculty AS f
                    ON s.faculty_id = f.id Group By faculty_type'); 
                    
      // to count contribution with chart
      $registrations_count_raw = DB::select('SELECT count(s.id) / 100 as counting,f.type as faculty_type
                                FROM 
                                submission AS s
                                JOIN academic_year AS a
                                ON s.academic_year_id = a.id
                                JOIN users as u
                                ON s.user_id = u.id
                                JOIN faculty AS f
                                ON s.faculty_id = f.id GROUP BY f.type');
    
    // to select data from faculty
    $faculties = DB::select('select * from faculty');
    
    return view('backend.report.percentage')
    ->with('faculties', $faculties)
    ->with('registrations_count_raw', $registrations_count_raw)
    ->with('registrations', $registrations);
    }
    
    public function search_2($type = null)
    {
    if($type == null || $type == 0){
    // if $type is null or 0, it select the data from submisison, academic year and users tables to join with their foreign key
    $registrations = DB::select('SELECT count(s.id) / 100.0 as percent,f.type as faculty_type
                    from submission as s 
                    JOIN academic_year AS a
                    ON s.academic_year_id = a.id
                    JOIN users as u
                    ON s.user_id = u.id
                    JOIN faculty AS f
                    ON s.faculty_id = f.id Group By f.type'); 
                    
    }
    else{
    
    // to select the data from submisison, academic year and users tables to join with their foreign key which submission faculty id is equal to null
    $registrations = DB::select('SELECT count(s.id) / 100.0 as percent,f.type as faculty_type
                    from submission as s JOIN academic_year AS a
                    ON s.academic_year_id = a.id
                    JOIN users as u
                    ON s.user_id = u.id
                    JOIN faculty AS f 
                    ON s.faculty_id = f.id where s.faculty_id= ".$type." Group By f.type'); 
    
    }

    // to select data from faculty
    $faculties = DB::select('select * from faculty');
        
        return view('backend.report.percentage')
        ->with('faculties', $faculties)
        ->with('registrations', $registrations);
    }
    
    public function comment()
    {
        // to select the data from submisison, academic year and users tables to join with their foreign key which submission comment is equal to null
        $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                        FROM 
                        submission AS s
                        JOIN academic_year AS a
                        ON s.academic_year_id = a.id
                        JOIN users as u
                        ON s.user_id = u.id
                        JOIN faculty AS f
                        ON s.faculty_id = f.id
                        where s.comment is null');

        // to select data from faculty
        $faculties = DB::select('select * from faculty');
       
        return view('backend.report.comment')
            ->with('faculties', $faculties)
            ->with('registrations', $registrations);
    }

    public function search_3($type = null)
    {
        if($type == null || $type == 0){
            // if $type is null or 0, it select the data from submisison, academic year and users tables to join with their foreign key
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                            FROM 
                            submission AS s
                            JOIN academic_year AS a
                            ON s.academic_year_id = a.id
                            JOIN users as u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            where s.comment is null');

        }
        else{
            
            // to select the data from submisison, academic year and users tables to join with their foreign key which submission faculty id is equal to null
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                            FROM 
                            submission AS s
                            JOIN academic_year AS a
                            ON s.academic_year_id = a.id
                            JOIN users as u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            where s.comment is null and s.faculty_id ='.$type);

        }
        
        // to select data from faculty
        $faculties = DB::select('select * from faculty');
        
        return view('backend.report.comment')
            ->with('faculties', $faculties)
            ->with('registrations', $registrations);
    }
  
    public function aftercomment()
    {
        // to select the data from submisison, academic year and users tables to join with their foreign key which submission comment id equal to null
        // to condition the comment button which interval 14 days
        // not to show the comment button if the today is greater then submission date
        $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                        FROM 
                        submission AS s
                        JOIN academic_year AS a
                        ON s.academic_year_id = a.id
                        JOIN users as u
                        ON s.user_id = u.id
                        JOIN faculty AS f
                        ON s.faculty_id = f.id
                        where s.comment is null and s.add_date < curdate()');
        // Can use the under condition instead of s.add_date
        //  DATE_ADD(submission_date, interval 14 day)
        // to select data from faculty
        $faculties = DB::select('select * from faculty');
       
        return view('backend.report.after')
            ->with('faculties', $faculties)
            ->with('registrations', $registrations);
    }

    public function search_4($type = null)
    {
        if($type == null || $type == 0){
            // if $type is null or 0, it select the data from submisison, academic year and users tables to join with their foreign key
                    // to condition the comment button which interval 14 days
        // not to show the comment button if the today is greater then submission date
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                            FROM 
                            submission AS s
                            JOIN academic_year AS a
                            ON s.academic_year_id = a.id
                            JOIN users as u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            where s.comment is null and s.add_date < curdate()');
            // Can use the under condition instead of s.add_date
            //  DATE_ADD(submission_date, interval 14 day)

        }
        else{
            
            // to select the data from submisison, academic year and users tables to join with their foreign key which submission faculty id is equal to null
                    // to condition the comment button which interval 14 days
        // not to show the comment button if the today is greater then submission date
            $registrations = DB::select('SELECT s.*,a.s_academic_year AS s_academic_year, a.e_academic_year AS e_academic_year,u.name AS user_name,f.type AS faculty_type 
                            FROM 
                            submission AS s
                            JOIN academic_year AS a
                            ON s.academic_year_id = a.id
                            JOIN users as u
                            ON s.user_id = u.id
                            JOIN faculty AS f
                            ON s.faculty_id = f.id
                            where s.comment is null and s.add_date < curdate() and s.faculty_id ='.$type);
            // Can use the under condition instead of s.add_date
            //  DATE_ADD(submission_date, interval 14 day)

        }
        
        // to select data from faculty
        $faculties = DB::select('select * from faculty');
        
        return view('backend.report.after')
            ->with('faculties', $faculties)
            ->with('registrations', $registrations);
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
    public function edit($id)
    {
        //
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
