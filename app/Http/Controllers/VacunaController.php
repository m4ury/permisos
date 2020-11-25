<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacuna;
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
        $totalVacunados = Vacuna::all()->count();
        $totalVacunadosHoy = Vacuna::whereDay('vacuna_fecha', now()->day)->count();

        $totalEmbarazadas = Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipo_nombre', 'Embarazadas')
            ->count();
        $totalEmbarazadasHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Embarazadas')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $totalFunPublicos = Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Personal de Salud Público')
            ->count();
        $totalFunPublicosHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Personal de Salud Público')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $totalFunPrivado =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Personal de Salud Privado')
            ->count();
        $totalFunPrivadoHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Personal de Salud Privado')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $totalCronico1164 =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Crónico entre 11 y 64 años')
            ->count();
        $totalCronico1164Hoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Crónico entre 11 y 64 años')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $total0610 =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', '6 meses a 10 años')
            ->count();
        $total0610Hoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', '6 meses a 10 años')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $total65Mas =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', '65 y mas años')
            ->count();
        $total65MasHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', '65 y mas años')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $totalAvicolasCerdos =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Trab. avicolas y criadores de cerdos')
            ->count();
        $totalAvicolasCerdosHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Trab. avicolas y criadores de cerdos')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $totalOtros =  Vacuna::with('paciente', 'tipo')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Otros')
            ->count();
        $totalOtrosHoy = \DB::table('vacunas')
            ->join('pacientes', 'pacientes.id', '=', 'vacunas.paciente_id')
            ->join('tipos', 'tipos.id', '=', 'pacientes.tipo_id')
            ->where('tipos.tipo_nombre', '=', 'Otros')
            ->whereDay('vacunas.vacuna_fecha', '=', now()->day)
            ->count();

        $vacunas = Vacuna::with('paciente.tipo')
            ->latest('vacuna_fecha')
            ->paginate(9);

        return view('vacuna.index', compact('vacunas', 'totalVacunados', 'totalVacunadosHoy', 'totalEmbarazadas', 'totalEmbarazadasHoy', 'totalFunPublicos', 'totalFunPublicosHoy', 'totalFunPrivado', 'totalFunPrivadoHoy', 'totalCronico1164', 'totalCronico1164Hoy', 'total0610', 'total0610Hoy', 'total65Mas', 'total65MasHoy', 'totalAvicolasCerdos', 'totalAvicolasCerdosHoy', 'totalOtros', 'totalOtrosHoy'));
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
    public function store(StoreVacuna $request)
    {
        $vacuna = Vacuna::create([
            'vacuna_fecha' => $request->vacuna_fecha,
            'paciente_id' => (Paciente::firstOrCreate([
                'paciente_rut' => $request->paciente_rut
            ], [
                'paciente_nombres' => $request->paciente_nombres,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'paciente_sexo' => $request->paciente_sexo,
                'tipo_id' => $request->tipo_id,
            ]))->id
        ]);

        return redirect()->route('vacunas.index')->with('success', 'Nueva Registro ha sido creado con exito');

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
