<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //     $cars = DB::select('select * from car');
    //     return view('home')
    //         ->with('cars', $cars);
    //

    // 
    $loginUser = Auth::user();
        // to select ID from users and faculty tables
        if ($loginUser->role_id == 1) {
            $objs=DB::select('SELECT u.*, f.type as faculty_type from
            users as u  Left JOIN faculty as f 
            on u.faculty_id=f.id');

        }
        // to select the user's information which is also same as the login user id which is for marketing manager
        elseif($loginUser->role_id == 2){
            $loginUserId = $loginUser->id;
            $objs=DB::select('Select * from users where id='.$loginUserId);
        }
        // to select the user's information which is also same as the login user id which is for guest
        elseif($loginUser->role_id == 5){
            $loginUserId = $loginUser->id;
            $objs=DB::select('Select * from users where id='.$loginUserId);
        }
        // to select the user's information and faculty's information which is also same as the login user id which is for guest
        else{
            $loginUserId = $loginUser->id;
            $objs=DB::select('SELECT u.*, f.type as faculty_type from
            users as u join faculty as f
            ON u.faculty_id = f.id
            where u.id='.$loginUserId);


        }
        // to return the variables to the view
        return view('home')
        ->with('objs', $objs);
 }
 public function edit($id)
    {
       
        $id = Crypt::decrypt($id);
        
        // to select the respective user id
        $user = DB::select('select * from users where id = ?',[$id]);
        
        // General knowledge about the data retrieve and SQL Injection Case
        // the only difference here is the syntax. Yes, a DB::select doesn't protect against SQL injection. 
        // But SQL injection is only a risk when you pass in user input. 
        // For example this is vulnerable to SQL injection:
        // DB::select('SELECT * FROM users WHERE name = "'.Input::get('name').'"');
        // But Whereas this is not with DB::table case:
        // DB::table('users')->where('name', Input::get('name'))->get();
        // But also this isn't: (Using bindings "manually")
        // DB::select('SELECT * FROM users WHERE name = ?', array(Input::get('name')));
        
        //$user = DB::table('users')->where('id', $id)->get();
        // get() method will return as array with many sub child and you need to call as $user[0]
        $user2 = DB::table('users')->where('id', $id)->first();
        
        // to return the variables to the view
        return view('backend.user.edit')
        ->with('user',$user)
        ->with('user2',$user2);
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
        $this->validate($request,[
            
            'email' => 'required|email|unique:users,email,'. $id .'',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|min:11|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
           
            ]);

         
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $phone = $request->input('phone');
        $address = $request->input('address');
        $status = $request->input('status');
        $updated_at = date("Y-m-d H:i:s");
                
        
        try{
            
            // to create the folder path when it save images
            if($image = $request->file('image')){
               
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('profile'), $new_name);
                $image_file = "/profile/" . $new_name;
                DB::update('update users set  email = ?,  password = ?, phone = ?, address = ?, image = ?, status = ?, updated_at = ? where id = ?', [$email,$password,$phone,$address,$image_file,$status,$updated_at,$id]);
            }
            else{
                DB::update('update users set  email = ?,  password = ?, phone = ?, address = ?, status = ?, updated_at = ? where id = ?', [$email,$password,$phone,$address,$status,$updated_at,$id]);
            }
           
            $smessage = 'Success, user updated successfully ...!';
            $request->session()->flash('success', $smessage);

            // return redirect()->route('backend/car');
            // return redirect()->action(
            //     'UserController@profile', ['id' => 1]
            // );
            
            // to return view
            return redirect()->action(
                'HomeController@index'
            );
        }
            catch(Exception $e){
            
            // to show the alert box 
            $smessage = 'Fail, Error in user updating ...!';
            $request->session()->flash('fail', $smessage);

            return redirect()->action(
                'HomeController@index'
            );
        }

 }

   

}
