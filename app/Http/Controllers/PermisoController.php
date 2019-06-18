<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Permiso;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePermiso;


class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $permisos = $user->permisos()->latest()->whereMonth('dia_inicio', '=', date('m'))->paginate(10);

       return view('permiso.index', compact('permisos'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permiso = new Permiso;

        return view('permiso.create', compact('permiso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermiso $request)
    {
        if ($permiso = Permiso::create($request->except('_token'))){
            return redirect()->route('permisos.index')->with('info', 'Nuevo permiso creado!');
        }else
            return redirect()->route('permisos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permiso = Permiso::findOrFail($id);
        $user = User::findOrFail($id);

        $permisoUser = $permisos->user;
        $cargoUser = $user->cargo;

        $view = view('permiso.show', compact('permiso', 'user', 'permisoUser', 'cargoUser'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('permiso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
