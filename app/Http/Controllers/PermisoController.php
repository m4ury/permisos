<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\User;
use App\Viatico;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Requests\StorePermiso;


class PermisoController extends Controller
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
        $permisos = $user->permisos()->latest('dia_inicio')->whereMonth('dia_inicio', '=', date('m'))->paginate(5);
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
        if ($request->incluye_viatico) {
            $permiso = Permiso::updateOrCreate($request->except('_token'));
            $permiso->crearConViatico($permiso->id);
                return redirect()->route('permisos.index')->with('info', 'Nuevo permiso creado con Viatico!');
        } else
            if ($permiso = Permiso::updateOrCreate($request->except('_token'))){
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
        $permisos = Permiso::findOrFail($id);

        $view = view('permiso.show', compact('permisos'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('permiso_'.$permisos->id.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCap($id)
    {
        $permisos = Permiso::findOrFail($id);

        $view = view('capacitacion.show', compact('permisos'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->stream('cap_'.$permisos->id.'_'.$permisos->created_at.'pdf');
    }

    public function showViatico($id)
    {
        $permisos = Permiso::findOrFail($id);

        $view = view('viatico.show', compact('permisos'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('cap_'.$permisos->id.'_'.$permisos->created_at.'pdf');
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
