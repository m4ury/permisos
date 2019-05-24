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
        $permisosUsuario = DB::table('permisos')
            ->join('users', 'users.id', '=', 'permisos.user_id')
            ->where('permisos.user_id', '=', Auth::user()->id)
            ->select('permisos.dia_inicio', 'permisos.dia_fin', 'permisos.created_at', 'permisos.descripcion', 'permisos.lugar', 'permisos.estado', 'permisos.tipo', 'permisos.correlativo', 'permisos.hora_inicio', 'permisos.hora_fin', 'permisos.id')
            ->orderBy('permisos.created_at', 'DESC')
            ->paginate(10);

            return view('permiso.index', compact('permisosUsuario'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permiso = new Permiso;
        $user = new User;
        $cargo = new Cargo;

        return view('permiso.create', compact('permiso', 'user', 'cargo'));
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
        //
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
