<?php

namespace App\Http\Controllers\Admin;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Flash;
use App\Http\Controllers\Controller;
use Response;

class PackageController extends Controller
{
    public function create(){
        return view('admin.packages.create');
    }
    public function store(Request $request){
        
        $rules = array(
            'name' => 'required',
            'desc' => 'required|min:8',
            'price'=>'required|numeric|min:2',
            'number_of_ads'=>'required|numeric|min:1'
          );
           
            $validator = Validator::make($request->all() , $rules);
            if ($validator->fails())
              {
              
               return Redirect::back()->withInput($request->all())->withErrors($validator) ;
              }
              else
              {
              $data = array(
                'title' =>$request->name,
                'desc' => $request->desc,
                'price'=>$request->price,
                'number_of_ads'=>$request->number_of_ads
              );
              
            
              }
              $check =Package::create($data);
    
              return redirect("packages/list")->with('success', 'Package Created successfully');
      }
public function index(){
    $packages=Package::all();
    return view('admin.packages.index')->with('packages',$packages);
}

public function edit($id){
    $package=Package::findOrFail($id);
    return view('admin.packages.edit')->with('package',$package);
}
public function update($id,Request $request){
    $package=Package::findOrFail($id);
    $rules = array(
        'name' => 'required',
        'desc' => 'required|min:8',
        'price'=>'required|numeric|min:2',
        'number_of_ads'=>'required|numeric|min:1'
      );
       
        $validator = Validator::make($request->all() , $rules);
        if ($validator->fails())
          {
          
           return Redirect::back()->withInput($request->all())->withErrors($validator) ;
          }
          else
          {
          $data = array(
            'title' =>$request->name,
            'desc' => $request->desc,
            'price'=>$request->price,
            'number_of_ads'=>$request->number_of_ads
          );
          
        
          }
          $check =$package->update($data);
      return redirect("packages/list")->with('success', 'Package Updated successfully');
}

public function destroy($id){
    $package=Package::findOrFail($id);
    $package->delete();
    return redirect("packages/list")->with('success', 'Package deleted successfully');
}
}