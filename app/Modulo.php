<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable = [
        'name', 'slug', 'padre_id', 'servicio_id', 'maker_id', 'status',
    ];
    
    public function maker(){
        return $this->belongsTo(User::class);
    }
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
    public function hijos(){
        return $this->hasMany(Modulo::class, 'padre_id', 'id');
    }
    public function padre(){
        return $this->belongsTo(Modulo::class, 'padre_id', 'id');
    }
    public function documentos(){
        return $this->hasMany(Modulo_documento::class, 'modulo_id', 'id');
    }
    static public function hijo($id_padre, $id){
        $padre = Modulo::find($id);
        if($padre->padre_id!=null){            
            if($padre->padre_id != $id_padre){
                $id=Modulo::hijo($id_padre,$padre->padre_id);
            }
            else{
                $id=$padre->id;
            }
        }        
        else{
            $id=0;
        }
        return $id;
    }

    static public function padre2($id){
        $padre = Modulo::find($id);
        if($padre->padre_id!=null){
                $id=Modulo::padre2($padre->padre_id);
        }        
        else{
            $id=$padre->id;
        }
        return $id;
    }
}
