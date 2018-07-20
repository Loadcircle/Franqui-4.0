<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket', 'asunto', 'status', 'maker_id', 'empresa_id',
    ];
    public function mensaje(){
        return $this->hasMany(Ticket_mensaje::class);
    }
    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }    
    public function maker(){
        return $this->belongsTo(User::class, 'maker_id', 'id');
    }
}
