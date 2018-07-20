<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket_mensaje extends Model
{
    protected $fillable = [
        'mensaje', 'cliente', 'maker_id', 'ticket_id',
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
    public function maker(){
        return $this->belongsTo(User::class, 'maker_id', 'id');
    }
}
