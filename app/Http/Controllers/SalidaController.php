<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalida;
use App\Salida;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Carbon;
use Illuminate\Support\Facades\App;
use App\Events\SalidaFueCreada;

class SalidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $salidas = $user->salidas()->latest('dia_salida')->whereMonth('dia_salida', '=', date('m'))->paginate(5);
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
        $user = User::find(Auth::id());
        $dif = Carbon\Carbon::parse($request->hora_llegada)->diffInMinutes(Carbon\Carbon::parse($request->hora_salida));
        $ocupadoMes = $user->salidas()->latest()->whereMonth('dia_salida', '=', date('m'))->sum('horas_ocupado');

        if (($ocupadoMes + $dif) <= 120 ) {

            if ($salida = Salida::updateOrCreate($request->except('_token'))) {

                $diferencia = Carbon\Carbon::parse($request->hora_llegada)->diffInMinutes(Carbon\Carbon::parse($request->hora_salida));
                $salida->horas_ocupado = $diferencia;
                /*$salida->estado = 'impreso';*/
                $salida->save();

                event(new SalidaFueCreada($salida));

                return redirect()->route('salidas.index', $salida->id)->with('info', 'Nueva Salida creada!');
                }else
                    return redirect()->route('salidas.index')->with('info', 'Algo paso...!');
            } else
                return redirect()->route('salidas.index')->with('danger', 'Sobrepasa Limite de 2 horas!');
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

        $view = view('salida.show', compact('salida'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('salida_'.$salida->id.'.pdf');
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
