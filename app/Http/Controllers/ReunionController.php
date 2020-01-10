<?php

namespace App\Http\Controllers;

use App\Reunion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReunion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use App\User;
use App\Categoria;


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

        $reuniones = Reunion::latest('created_at')
            ->tituloreunion($titulo_reunion)
            ->diareunion($dia_reunion)
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
        $data =  User::all();

        return view('reuniones.create', compact('reunion', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|string
     */
    public function store(StoreReunion $request)
    {

        dd($request->data->id);

        return $permiso = Reunion::updateOrCreate($request->except('_token')) ? redirect()->route('reuniones.index')->with('success', 'Nueva reunion creada!') : redirect()->route('reunion.index')->with('danger', 'Algo salió Mal :(');
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
     * @param  \App\Reunion $reunion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reunion $reunion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Reunion $reunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reunion $reunion)
    {
        //
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
