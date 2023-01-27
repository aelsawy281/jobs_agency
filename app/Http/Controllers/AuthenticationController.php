<?php
namespace App\Http\Controllers;
use Redirect;
use Auth;
//use Input;
use Illuminate\Support\Facades\Validator;
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
    Auth::logout(); // logging out user
    return Redirect::to('/'); // redirection to login screen
    }
  public function login(Request $request)
    {
      
    // Creating Rules for Email and Password
    $rules = array(
      'email' => 'required|email', // make sure the email is an actual email
      'password' => 'required|alphaNum|min:8',
      'role'=>'required'
    );
      // password has to be greater than 3 characters and can only be alphanumeric and);
      // checking all field
      $validator = Validator::make($request->all() , $rules);
      // if the validator fails, redirect back to the form
      if ($validator->fails())
        {
          echo "no";
        // return Redirect::to('login')->withErrors($validator) // send back all errors to the login form
        // ->withInput($request::except('password')); // send back the input (not the password) so that we can repopulate the form
        }
        else
        {
        // create our user data for the authentication
        $userdata = array(
          'email' =>$request->email,
          'password' => $request->password,
          'role'=>$request->role
        );
        // attempt to do the login
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
            echo "data error";
          }
          
      
          // validation not successful, send back to form
          // return Redirect::to('checklogin');
          
        }
      }
    }