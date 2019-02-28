<?php

namespace App;
use App\Department;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','department_id',
    ];

    protected $attributes = [
        'deleted' => 0,
        'department_id' => 0,
        
     ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function departments(){
        return $this->hasOne('App\Department');
      } 
   
}
