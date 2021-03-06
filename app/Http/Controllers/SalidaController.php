<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalida;
use App\Salida;
use App\Cargo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Carbon;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidaUsuario = DB::table('salidas')
            ->join('users', 'users.id', '=', 'salidas.user_id')
            ->where('salidas.user_id', '=', Auth::user()->id)
            ->select('salidas.dia_salida', 'salidas.created_at', 'salidas.descripcion', 'salidas.estado', 'salidas.tipo', 'salidas.hora_llegada', 'salidas.hora_salida', 'salidas.id')
            ->orderBy('salidas.created_at', 'DESC')
            ->paginate(10);

            return view('salida.index', compact('salidaUsuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();
        $user = new User;
        $cargo = new Cargo;

        return view('salida.create', compact('salida', 'user', 'cargo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalida $request)
    {
        if ($salida = Salida::create($request->except('_token'))){

            /*$salida_inicio = $request->hora_salida;
            $salida_fin = $request->hora_llegada;

            $tiempo_ocupado = Carbon\Carbon::parse($salida_fin)->diffInMinutes(Carbon\Carbon::parse($salida_inicio));*/

            return redirect()->route('salidas.index')->with('info', 'Nueva Salida creada!');
        }else
            return redirect(route('salidas.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        //
    }
}
