<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta_documento extends Model
{
    protected $fillable = [
        'herramienta_id', 'documento_id', 'empresa_id', 'status'
    ];
    
    public function documentos()
    {
        return $this->belongsToMany(Documento::class);
    }
    
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
