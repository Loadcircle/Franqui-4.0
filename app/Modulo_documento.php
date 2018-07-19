<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo_documento extends Model
{
    protected $fillable = [
        'modulo_id', 'documento_id', 'empresa_id', 'status'
    ];
    
    public function documentos()
    {
        return $this->belongsTo(Documento::class, 'documento_id', 'id');
    }
    
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
