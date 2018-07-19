<?php 

function active($path)
{
    return request()->is($path) ? 'active' : '';
}

function statusbg($status)
{
    if($status == 1){
        $class = 'pendiente';
    }elseif($status == 2){
        $class = 'concretada';
    }elseif($status == 3){
        $class = 'cancelada';
    }
    
    return $class;
}