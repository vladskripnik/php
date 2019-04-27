<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	use Notifiable;
	public $timestamps = false;
    //
    protected $fillable = [
        'group'
    ];
}
