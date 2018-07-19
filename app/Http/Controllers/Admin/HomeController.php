<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empresa;
use App\Notification;
use App\Acceso;
use App\Herramienta_documento;
use App\Modulo_documento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($empresa = null)
    { 
        $last_log = Acceso::orderBy('created_at', 'desc')->where('user_id', '=', Auth::user()->id)->skip(1)->take(1)->first();
        if(!isset($last_log->created_at)){
            $last_con = 0;
        }else{
            $last_con = $last_log->created_at;
        }
        $notificaciones_h = Notification::orderBy('notifications.created_at', 'desc')
                                        ->where('notifications.created_at', '>', $last_con)
                                        ->where('section', '=', '1')
                                        ->leftJoin('documentos', 'documentos.id', 'notifications.documento_id')
                                        ->leftJoin('herramienta_documentos', 'herramienta_documentos.documento_id', 'notifications.documento_id')              
                                        ->select('notifications.*', 'documentos.name as d_name', 'herramienta_documentos.*')                          
                                        ->get();

        $notificaciones_m = Notification::orderBy('notifications.created_at', 'desc')
                                        ->where('notifications.created_at', '>', $last_con)
                                        ->where('section', '=', '2')
                                        ->leftJoin('documentos', 'documentos.id', 'notifications.documento_id')
                                        ->leftJoin('modulo_documentos', 'modulo_documentos.documento_id', 'notifications.documento_id')              
                                        ->select('notifications.*', 'documentos.name as d_name', 'modulo_documentos.*')                          
                                        ->get();


        $notificaciones_r = Notification::orderBy('notifications.created_at', 'desc')
                                        ->where('notifications.created_at', '>', $last_con)
                                        ->where('section', '=', '3')
                                        ->leftJoin('agendas', 'agendas.id', 'notifications.agenda_id')                         
                                        ->get();
        
                                







        return view('home', compact('notificaciones_h', 'notificaciones_m', 'notificaciones_r'));
    }
}
