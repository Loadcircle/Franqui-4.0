<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'name', 'razon_social', 'logo', 'maker_id', 'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function maker()
    {
        return $this->belongsTo(User::class);
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }

}