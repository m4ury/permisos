<?php

namespace App\Http\Controllers;

use App\Reunion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReunion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\User;
use App\Categoria;
use Illuminate\Support\Facades\Auth;


class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo_reunion = $request->get('titulo_reunion');
        $dia_reunion = $request->get('dia_reunion');
        $cuerpo = $request->get('cuerpo_reunion');


        $reuniones = Reunion::latest('dia_reunion')
            ->tituloreunion($titulo_reunion)
            ->diareunion($dia_reunion)
            ->cuerpo($cuerpo)
            ->where('creador_reunion', Auth::user()->rut)
            ->paginate(5);

        return view('reuniones.index', compact('reuniones'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reunion = new Reunion;
        $categorias = Categoria::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');
        $users = User::select(\DB::raw('CONCAT(name, " ", apellido_paterno, " - ", rut) AS full_name, id'))->pluck('full_name', 'id');

        return view('reuniones.create', compact('reunion', 'users', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|string
     */
    public function store(StoreReunion $request)
    {
        $reunion = new Reunion($request->except('_token'));
        $reunion->creador_reunion = Auth::user()->rut;
        $reunion->categoria_id = $request->categoria_id;
        $reunion->save();

        $reunion->users()->sync($request->users);
        return redirect()->route('reuniones.index')->with('success', 'Nueva Reunion ha sido creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $reunion = Reunion::findOrFail($id);

        $view = view('reuniones.show', compact('reunion'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->stream('reuniones_' . $reunion->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunion = Reunion::findOrFail($id);
        $usuarios = User::select(\DB::raw('CONCAT(name, " ", apellido_paterno, " - ", rut) AS full_name, id'))->pluck('full_name', 'id');
        $categorias = Categoria::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');

        return view('reuniones.edit', compact('reunion', 'usuarios', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reunion = Reunion::find($id);
        $reunion->users()->sync($request->user_id);
        $reunion->update($request->except(['_token', '_method', 'user_id']));

        return redirect()->route('reuniones.index')->with('success', 'Cambios relizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reunion $reunion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reunion $reunion)
    {
        //
    }
}
