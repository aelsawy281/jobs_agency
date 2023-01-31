<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Specialty;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Flash;
use App\Http\Controllers\Controller;
use Response;

class JobController extends Controller
{
    public function create(){
      $specialty_name=Specialty::all();
        return view('admin.jobs.create')->with('specialty_name',$specialty_name);
    }
    public function store(Request $request){
        
        $rules = array(
            'title' => 'required|min:4',
            'desc' => 'required|min:8',
            'speciality_name'=>'required',
          );
           
            $validator = Validator::make($request->all() , $rules);
            if ($validator->fails())
              {
              
               return Redirect::back()->withInput($request->all())->withErrors($validator) ;
              }
              else
              {
              
                $speciality_id=Specialty::where('name',$request->speciality_name)->pluck('id');
               
            
                $user_id=Auth::user()->id;
           
              $data = array(
                'title' =>$request->title,
                'desc' => $request->desc,
                'speciality_id'=>$speciality_id[0],
                'user_id'=>$user_id
              );
              
            
              }
              $check =Job::create($data);
    
              return redirect("jobs/list")->with('success', 'Job Created successfully');
      }
public function index(){
    $jobs=Job::all();
   // dd($jobs);
    return view('admin.jobs.index')->with('jobs',$jobs);
}

public function edit($id){
    $job=Job::findOrFail($id);
    $specialty_name=Specialty::all();
    return view('admin.jobs.edit')->with('job',$job)->with('specialty_name',$specialty_name);;
}
public function update($id,Request $request){
    $job=Job::findOrFail($id);
    $rules = array(
      'title' => 'required|min:4',
      'desc' => 'required|min:8',
      'speciality_name'=>'required',
    );
       
    $validator = Validator::make($request->all() , $rules);
    if ($validator->fails())
      {
      
       return Redirect::back()->withInput($request->all())->withErrors($validator) ;
      }
      else
      {
        $speciality_id=Specialty::where('name',$request->speciality_name)->pluck('id');
               
            
        $user_id=Auth::user()->id;
   
      $data = array(
        'title' =>$request->title,
        'desc' => $request->desc,
        'speciality_id'=>$speciality_id[0],
        'user_id'=>$user_id
      );
      
    
      }
       $job->update($data);

      return redirect("jobs/list")->with('success', 'Job Updated successfully');
}

public function destroy($id){
    $job=Job::findOrFail($id);
    $job->delete();
    return redirect("jobs/list")->with('success', 'Job deleted successfully');
}
}