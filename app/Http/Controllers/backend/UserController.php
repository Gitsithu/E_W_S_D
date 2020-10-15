<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Mail\PasswordMail;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to select the data from faculty which delected is null
        $faculty=DB::select('SELECT * from faculty where deleted_at is null');
        return view('backend.user.create')
        ->with('faculty',$faculty);
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
            'name' => 'required|max:225',
            'password' => 'required|min:8|confirmed',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
          
          
          
            
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));

            $phone = $request->input('phone');
            $address = $request->input('address');
            $role_id = $request->input('role_id');
            $faculty_id = $request->input('faculty_id');
            $status = $request->input('status');
            $created_at = date("Y-m-d H:i:s");
            
            $comment = ' aaaaaaaa ';    
            
            
            // to mail the users of his profile information
            Mail::to($email)->send(new PasswordMail($comment,$email));
           
            DB::insert('insert into users (name,email,password,phone,address,role_id,faculty_id,status,created_at) values(?,?,?,?,?,?,?,?,?)', 
            [$name,$email,$password,$phone,$address,$role_id,$faculty_id,$status,$created_at]);    

            // to alert and email when account is created is successfully
                $message = 'Success, user registered and email sent successfully ...!';
                $request->session()->flash('success', $message);
    
                // return redirect()->route('backend/car_type');
                // return redirect()->action(
                //     'UserController@profile', ['id' => 1]
                    // );
                    return redirect()->route('home');
        
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
