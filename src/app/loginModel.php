<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loginModel extends Model
{
    protected $table='user';
    protected $fillable = [
        "id",
        "name",
        "slug",
        "parent_id",
        "status",
        
    ];
}
