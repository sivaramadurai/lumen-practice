<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Department;

class UsersController extends Controller{
    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required'
        ]);

        if($validator->fails()){
            return array(
                'error' =>true,
                'message'=>$validator->errors()->all()
            );
        }
        $users = new User;
        $users->name  = $request->input('name');
        $users->email = $request->input('email');
        
        $users->save();

    }

    public function index(){
        $users = User::all();
        return array('error'=>false,'users'=>$users);
    }

    public function update($id,Request $request){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return array('status'=>'success');
   }

    public function delete($id){
        User::findOrFail($id)->delete();
        return array('status'=>'success');

    }
}


