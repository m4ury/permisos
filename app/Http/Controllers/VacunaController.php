<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Tipo;
use App\Vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vacunas = Vacuna::with('paciente')->latest('vacuna_fecha')->paginate(9);

        return view('vacuna.index', compact('vacunas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        $vacuna = new Vacuna;
        return view('vacuna.create', compact('tipos', 'vacuna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       dd($request->all());
        Vacuna::create([
            'vacuna_fecha' => $request->vacuna_fecha,
            'paciente_id' => (Paciente::firstOrNew([
                'paciente_rut' => $request->paciente_rut
            ], [
                'paciente_nombres' => $request->paciente_nombres,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'sexo' => $request->paciente_sexo,
                'tipo_id' => $request->tipo_id,
            ]))->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Vacuna $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show(Vacuna $vacuna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Vacuna $vacuna
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacuna $vacuna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Vacuna $vacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacuna $vacuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Vacuna $vacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacuna $vacuna)
    {
        //
    }
}
