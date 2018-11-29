<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_object extends Model
{
    protected $table = 'permission_objects';
    protected $fillable = ['id','name', 'slug'];
    public $timestamps = true;


    public function permissions()
    {
        $this->permissions = $this->hasMany('App\Permission', 'object_id')->get();
        return $this;
    }



}
