<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $fillable = ['nome'];
    
    protected $table = 'sistema';
}
