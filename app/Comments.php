<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
	use SoftDeletes;
    protected $table 	= 'comments';
    protected $fillable = ['id', 'ip_address', 'name', 'city', 'email', 'comment'];
    protected $dates 	= ['deleted_at'];
}
