<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_permissions extends Model
{
    protected $table = 'role_permissions';
    protected $fillable = ['id','role_id', 'permission_id', 'slug', 'status'];
    public $timestamps = true;
}
