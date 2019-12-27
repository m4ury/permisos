<?php

namespace App\Http\Controllers;

use App\Viatico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ViaticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viatico = Viatico::findOrFail($id);
        $diasCometido = $viatico->countDias($viatico->permiso->dia_inicio, $viatico->permiso->dia_fin);

        $view = view('viatico.show', compact('viatico', 'diasCometido'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('viatico_' . $viatico->id . '_' . $viatico->created_at . 'pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $viatico = Viatico::findOrfail($id);

            return view('permiso.edit', compact('viatico'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $viatico = Viatico::findOrFail($id);

        if ($viatico->update($request->all())) {
            return redirect('permisos')->with('info', 'El valor del viatico ha sido modificado!');
        } else {
            return view('viatico.form', compact('viatico'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
