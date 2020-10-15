<?php

namespace App\Http\Controllers\Auth;
use DB;
use Exception;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * condition sit yamen exmaple login==1 2 3
     */
    
    
    // protected $redirectTo = '/backend/dashboard';
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function authenticated(Request $request, $user)
    {   
        // saving into log
        $user_id = $user->id;
        $date = Carbon::now();
        $role_id=$user->role_id;
        if($role_id==2)
        {
            $role_id="Marketing Manager";
        }
        elseif($role_id==3)
        {
            $role_id="Marketing Coordinator";
        }
        elseif($role_id==4)
        {
            $role_id="Student";
        }
        elseif($role_id==5)
        {
            $role_id="Guest";
        }
        else
        {
            $role_id="Admin";
        }
        

        $created_at = date("Y-m-d H:i:s");

        $log = DB::insert('insert into log (user_id,date,user_role,created_at) values(?,?,?,?)', 
                [$user_id,$date,$role_id,$created_at]);
        // if role_id 4 it redirect to index page
        if($user->role_id == 4) {
            return redirect('/'); // it will be according to your routes.

        }
        // if role_id 5 it redirect to guest page
        else if( $user->role_id==5){
            return redirect('guest'); // it will be according to your routes.
        } 
        // if role_id is else it redirect to dashboard page
        else {

                try{
                    $header_condition = DB::table('submission') 
                    ->wherenotNull('id')
                    ->first();
                if($header_condition == null)  
                {    
                    return redirect('/backend/pre_dashboard');
                }

                else{
                return redirect('/backend/dashboard');
            }
        }
        catch(Exception $e){
            
            // to alert message when it fail creating
            $smessage = 'Fail, Error in login dashboard_1 ...!';
            $request->session()->flash('fail', $smessage);

            return redirect('login');

        }

            // it also be according to your need and routes
            }/**
     * Create a new controller instance.
     *
     * @return void
     */
        }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
