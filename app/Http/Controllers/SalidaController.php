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
use \Barryvdh\DomPDF;
use Illuminate\Support\Facades\App;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());

        $salidas = $user->salidas()->whereMonth('dia_salida', '=', date('m'))->paginate(10);

            return view('salida.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();

        return view('salida.create', compact('salida'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalida $request)
    {
        $diferencia = Carbon\Carbon::parse($request->hora_llegada)->diffInMinutes(Carbon\Carbon::parse($request->hora_salida));

        if ($salida = Salida::create([$request->except('_token'), 'horas_ocupado' => $diferencia])){

            return redirect()->route('salidas.index')->with('info', 'Nueva Salida creada!');
        }else
            return redirect(route('salidas.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida::findOrFail($id);
        $salidaUser = $salida->user;
        $unidadUser = $salidaUser->unidad;

        $view = view('salida.show', compact('salida', 'salidaUser', 'unidadUser'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('salida');
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
