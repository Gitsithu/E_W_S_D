<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth;
use App\academic_year;
class Academic_yearController extends Controller
{
    //
    public function index()
    {
        // to select the delected_at from academic year
       $objs = academic_year::where('deleted_at', NULL)->get();
     

       return view('backend.academicyear.index')
       
        ->with('objs',$objs);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to return view to the data create page
        return view('backend.academicyear.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // to validate form
        $this->validate($request, [
            's_academic_year' => 'required|integer|digits:4|unique:academic_year|before:e_academic_year|min:'.date('Y'),  
            'e_academic_year' => 'required|integer|digits:4|unique:academic_year|after:s_academic_year|max:'.(date('Y')+1), 
            'first_closure_date' => 'required|after:today|before:final_closure_date',
            'final_closure_date' => 'required|after:today|after:first_closure_date', 
        ]);

        

        try{
            $loginUser = Auth::user();
            $s_academic_year = $request->input('s_academic_year');
            $e_academic_year = $request->input('e_academic_year');
            $first_closure_date = $request->input('first_closure_date');    
            $final_closure_date = $request->input('final_closure_date');    
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");

            DB::insert('insert into academic_year (s_academic_year,e_academic_year,first_closure_date,final_closure_date,status,created_at) values(?,?,?,?,?,?)', 
                        [$s_academic_year,$e_academic_year,$first_closure_date,$final_closure_date,$status,$created_at]);

            $smessage = 'Success, Academic Year created successfully ...!';
            $request->session()->flash('success', $smessage);

             // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
                    }
        catch(Exception $e){
            
            // to display errot when it fail to create
            $smessage = 'Fail, Error in Academic Year creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
        }

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
        
        $id = Crypt::decrypt($id);
         // to select id from academic where it also equal to user's input id
         $obj = DB::table('academic_year')->where('id', $id)->first();
         return view('backend.academicyear.edit', ['obj' => $obj]);
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
        // to validate form
        $this->validate($request, [
            's_academic_year' => 'required|integer|digits:4|date_format:Y|before:e_academic_year|min:'.date('Y'),  
            'e_academic_year' => 'required|integer|digits:4|after:s_academic_year|max:'.(date('Y')+1),  
            'first_closure_date' => 'required|after:today|before:final_closure_date',
            'final_closure_date' => 'required|after:today|after:first_closure_date',
        ]);


        $s_academic_year = $request->input('s_academic_year');
        $e_academic_year = $request->input('e_academic_year');
        $first_closure_date = $request->input('first_closure_date');    
        $final_closure_date = $request->input('final_closure_date');     
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
        

        try{
            
            
          
         DB::update('update academic_year set s_academic_year = ?, e_academic_year = ?, first_closure_date = ?, final_closure_date = ?,  status = ?, updated_at = ? where id = ?', [$s_academic_year,$e_academic_year,$first_closure_date,$final_closure_date,$status,$updated_at,$id]);
            
           // to show alert when it success in updating 
            $smessage = 'Success, Academic Year updated successfully ...!';
            $request->session()->flash('success', $smessage);

            // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
        }
            catch(Exception $e){
            // to show alert when it fail in updating 
            $smessage = 'Fail, Error in Academic Year updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // to delect it select the user's input id from the database 
        $obj = academic_year::find($id);
        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->s_academic_year .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->s_academic_year.' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\Academic_yearController@index'
            );
        }
    }
}


