<?php

namespace App\Http\Controllers;

use App\Permiso;
use App\User;
use App\Viatico;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Requests\StorePermiso;
use PDOException;


class PermisoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /*$mes = $request->get('mes');*/
        $descripcion = $request->get('descripcion');
        //$dia = $request->get('dia_inicio');


        $user = User::findOrFail(Auth::id());
        $permisos = $user->permisos()
            /*->mes($mes)*/
            ->descripcion($descripcion)
            /*->dia($dia)*/
            ->latest('dia_inicio')->paginate(5);


        return view('permiso.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permiso = new Permiso;
        return view('permiso.create', compact('permiso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response|string
     */
    public function store(StorePermiso $request)
    {
        //return $request;
        try {
            if ($request->incluye_viatico) {
                $permiso = Permiso::updateOrCreate($request->except('_token'));
                $permiso->crearConViatico($permiso->id);

                return redirect()->route('permisos.index')->with('info', 'Nuevo permiso creado con Viatico!');
            } else
                return $permiso = Permiso::updateOrCreate($request->except('_token')) ? redirect()->route('permisos.index')->with('info', 'Nuevo permiso creado!') : redirect()->route('permisos.create');
        } catch (PDOException $exception) {
            return back()
                ->with('danger', 'Fecha Duplicada')
                ->withInput()
                ->withException($exception);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $permisos = Permiso::findOrFail($id);

        $rango = $permisos->dia_fin > $permisos->dia_inicio ? implode(substr_replace($permisos->fechasDesdeRango($permisos->dia_inicio, $permisos->dia_fin), ' - ', 10, 0)) : Carbon\Carbon::parse($permisos->dia_inicio)->toFormattedDateString();

        $view = view('permiso.show', compact('permisos', 'rango'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('permiso_' . $permisos->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function showCap($id)
    {
        $permisos = Permiso::findOrFail($id);

        $rango = $permisos->dia_fin > $permisos->dia_inicio ? implode(substr_replace($permisos->fechasDesdeRango($permisos->dia_inicio, $permisos->dia_fin), ' - ', 10, 0)) : Carbon\Carbon::parse($permisos->dia_inicio)->toFormattedDateString();

        $view = view('capacitacion.show', compact('permisos', 'rango'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'portrait')->setWarnings(false);

        return $pdf->stream('cap_' . $permisos->id . '_' . $permisos->created_at . 'pdf');
    }

    /*public function showViatico($id)
    {
        $permisos = Permiso::findOrFail($id);

        $view = view('viatico.show', compact('permisos'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream('cap_'.$permisos->id.'_'.$permisos->created_at.'pdf');
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
