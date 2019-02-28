<?php
 
 namespace App;
 use App\User;
  
 use Illuminate\Database\Eloquent\Model;
  
 class Department extends Model 
  {
    protected $table = 'department';
    protected $fillable = [
        'dept_name',
    ];

    protected $attributes = [
        'deleted' => 0,
     ];

     public function users(){
        return $this->hasMany('App\User');
     }   
 }