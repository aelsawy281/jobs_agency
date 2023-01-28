<?php
namespace App\Http\Controllers;

use App\Models\User;
use Hash;
//use Redirect;
use Auth;
//use Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\BusDispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\Validates\Requests;
use Illuminate\Foundation\AuthAccessAuthorizesRequests;
use Illuminate\Http\Request;
class AuthenticationController extends BaseController
  {
  public function showLogin()
    {
   
    return view('authentication.login');
    }
  public function doLogout()
    {
    Auth::logout(); 
    return Redirect::to('/');
    }
  public function login(Request $request)
    {
      
    $rules = array(
      'email' => 'required|email',
      'password' => 'required|alphaNum|min:8',
      'role'=>'required'
    );
     
      $validator = Validator::make($request->all() , $rules);
      if ($validator->fails())
        {
        
         return Redirect::back()->withInput($request->all())->withErrors($validator) ;
        }
        else
        {
        $userdata = array(
          'email' =>$request->email,
          'password' => $request->password,
          'role'=>$request->role
        );
        
        if (Auth::attempt($userdata))
          {
            if($request->role=='admin' or $request->role=='advertiser'){
              echo "admin";
            }
          else{
            echo "employee";
          }
          }
          else{
            return  Redirect::back()->withInput($request->all())->with('error','your email or password or role are wrong.');
                    }
        
          
        }
      }

      public function showRegister()
      {
     
      return view('authentication.register');
      }
      public function register(Request $request)
    {  
     
      $rules = array(
        'name'=>'required',
        'email' => 'required|email',
        'password' => 'required|alphaNum|min:8',
        'role'=>'required'
      );
       
        $validator = Validator::make($request->all() , $rules);
        if ($validator->fails())
          {
          
           return Redirect::back()->withInput($request->all())->withErrors($validator) ;
          }
        else
        {
        $userdata = array(
          'name'=>$request->name,
          'email' =>$request->email,
          'password' =>  Hash::make($request->password),
          'role'=>$request->role
        );
        
        $check =User::create($userdata);
        
       return redirect("/")->withSuccess('You have signed-in');
    }
  }

    }