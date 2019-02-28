<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Department;
use App\User;

class DepartmentController extends Controller{
    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'dept_name'=>'required',
        ]);

        if($validator->fails()){
            return array(
                'error' =>true,
                'message'=>$validator->errors()->all()
            );
        }
 
        $departments = new Department;
        $departments->dept_name = $request->input('dept_name');
        $departments->save();
      



    }

    public function index(){
        $departments = Department::all();
        return array('error'=>false,'departments'=>$departments);

    }

    public function update($id,Request $request){
         $department = Department::findOrFail($id);
         $department->update($request->all());
         return array('status'=>'success');
    }

    public function delete($id){
        Department::findOrFail($id)->delete();
        return array('status'=>'success');

    }
}


