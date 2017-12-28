<?php

namespace App;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{   
    protected $fillable = ['title', 'content'];    
}
