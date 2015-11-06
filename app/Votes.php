<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Votes extends Model
{
	use SoftDeletes;
    protected $table 	= 'votes';
    protected $fillable = ['id', 'ip_address'];
    protected $dates 	= ['deleted_at'];
}
