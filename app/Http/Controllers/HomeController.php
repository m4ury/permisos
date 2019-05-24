<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;


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
    public function index()
    {
      $usuario = DB::table('users')
          ->join('rols', 'rols.id', '=', 'users.rol_id')
          ->join ('cargos', 'cargos.id', '=', 'users.cargo_id')
          ->join ('unidads', 'unidads.id', '=', 'users.unidad_id')
          ->where('users.id', '=', Auth::user()->id)
          ->select('u.name, u.rut, u.apellido_paterno, u.apellido_materno, u.activo, u.contrato, r.nombre, un.nombre,c.nombre');

        return view('home', compact('usuario'));
    }
}
