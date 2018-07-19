<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'maker_id', 'status'
    ];
    public function maker(){
        return $this->belongsTo(User::class);
    }
    public function modulos(){
        return $this->hasMany(Modulo::class);
    }    
    public function empresas()
    {
        return $this->belongsToMany(Empresa::class);
    }
}
