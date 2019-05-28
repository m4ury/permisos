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
        $mes_actual = Carbon\Carbon::parse(now())->format('m');

        $user = User::find(Auth::user()->id);

        $salidaUsuario = $user->salidas()->paginate(10);

            return view('salida.index', compact('salidaUsuario', 'mes_actual'));
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

        return view('salida.create', compact('salida','user', 'cargo'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalida $request)
    {
        /*$salida = Salida::create($request->except('_token'));

        dd($salida->user()->find());

        $salida->user()->create([
            'horas_coupado' => 20,
            'horas_saldo' => 30,
        ]);

        return redirect()->route('salidas.index');
*/

        if ($salida = Salida::create($request->except('_token'))){

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
        /*$salida = DB::table('salidas')
            ->join('users', 'users.id', '=', 'salidas.user_id')
            ->where('salidas.user_id', '=', $id)
            ->select('salidas.dia_salida', 'salidas.created_at', 'salidas.descripcion', 'salidas.estado', 'salidas.tipo', 'salidas.hora_llegada', 'salidas.hora_salida', 'salidas.id');*/    
        $salida = Salida::findOrFail($id);

        $view = view('salida.show', compact('salida'));
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
