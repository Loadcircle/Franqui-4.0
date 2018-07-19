<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $fillable = [
        'user_id', 'ip'
    ];
}
