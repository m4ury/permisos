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
        $usuario = User::findOrFail(Auth::id());
        $cargoUsuario = $usuario->cargo;
        $unidadUsuario = $usuario->unidad;

        return view('home', compact('usuario', 'cargoUsuario', 'unidadUsuario'));
    }
}
