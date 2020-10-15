<?php

namespace App\Http\Controllers\backend;
use Auth;
use DB;

use App\faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

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
        // to select data of faculty and academic_year table it join with foreign id which is also faculty delected is null
       $objs=DB::select('SELECT f.*, a.s_academic_year as s_academic_year,a.e_academic_year as e_academic_year from
                        faculty as f join academic_year as a on f.academic_year_id=a.id
                         where f.deleted_at is null');
     
       return view('backend.faculty.index')
       
        ->with('objs',$objs);
    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to select delected coulmn from academin year which is equal to null
        $academics=DB::select('SELECT * from academic_year where deleted_at is null');
        return view('backend.faculty.create')
        ->with('academics',$academics);
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
            
            'type' => 'required',
            
            
        ]);
        

        try{
            $loginUser = Auth::user();
            $user_id = $loginUser->id;
            $type = $request->input('type');
            $academic_year = $request->input('academic_year_id');    
            
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");

            DB::insert('insert into faculty (type,academic_year_id,user_id,status,created_at) values(?,?,?,?,?)', 
                        [$type,$academic_year,$user_id,$status,$created_at]);

                        // to alert message when it sucessfully created
            $smessage = 'Success, faculty created successfully ...!';
            $request->session()->flash('success', $smessage);

             // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );

            return redirect()->action(
                'backend\FacultyController@index'
            );
                    }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in faculty creating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\FacultyController@index'
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
        //to select id of faculty which is also equal to user's input id
         
         $obj = DB::table('faculty')->where('id', $id)->first();
         return view('backend.faculty.edit', ['obj' => $obj]);
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
        //to validate form
        $this->validate($request, [
            
            'type' => 'required',
           
        ]);
        $type = $request->input('type');
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
        
        try{
            
          
         DB::update('update faculty set  type = ?, status = ?, updated_at = ? where id = ?', [$type,$status,$updated_at,$id]);
            
           // to alert message when it update successfully
            $smessage = 'Success, faculty updated successfully ...!';
            $request->session()->flash('success', $smessage);

            return redirect()->action(
                'backend\FacultyController@index'
            );
        }
            catch(Exception $e){
            
                // to alert message when it fail updating
            $smessage = 'Fail, Error in faculty updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'backend\FacultyController@index'
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
        // to delect the data from database
        $obj = faculty::find($id);
        $obj->delete();
        if ($obj->trashed()) {            
            $message = 'Success, ' . $obj->type .' deleted successfully ...!';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\FacultyController@index'
            );
        }
        else{
            
            $message = 'Fail, ' . $obj->type .' cannot delete ..... !';
            $request->session()->flash('fail', $message);

            return redirect()->action(
                'backend\FacultyController@index'
            );
        }
    }
  
    }
