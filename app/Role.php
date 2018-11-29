<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = ['id','name','description'];
    public $timestamps = true;


    public function permissions()
    {
        $permissions = $this->hasMany('App\Role_permissions')->get();
        $permissions_array = array();
        foreach($permissions as $permission){
            $permissions_array[$permission->permission_id] = $permission;
        }
        $this->permissions = $permissions;
        $this->permissions_array = $permissions_array;
        return $this;
    }
    public function hasPermissionsSlug($slug)
    {
        return $this->hasMany('App\Role_permissions')->where('slug', $slug)->first();
    }

}
