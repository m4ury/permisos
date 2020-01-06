<?php

namespace App\Http\Controllers;

use App\Reunion;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReunion;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;


class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunion::latest('created_at')->paginate(5);
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
        return view('reuniones.create', compact('reunion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|string
     */
    public function store(StoreReunion $request)
    {

        return $permiso = Reunion::updateOrCreate($request->except('_token')) ? redirect()->route('reuniones.index')->with('success', 'Nueva reunion creada!') : redirect()->route('reunion.index')->with('danger', 'Algo salió Mal :(');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function show(Reunion $reunion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function edit(Reunion $reunion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reunion $reunion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reunion  $reunion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reunion $reunion)
    {
        //
    }
}
