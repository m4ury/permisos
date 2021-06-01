<?php

namespace App\Http\Controllers;

use App\Acuerdo;
use App\Categoria;
use App\Events\newReunionHasCreatedEvent;
use App\Events\ReunionCreada;
use App\Http\Requests\StoreReunion;
use App\Mail\notificarParticipanteMail;
use App\Reunion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ReunionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunion::latest('dia_reunion')
            ->where('creador_reunion', Auth::user()->rut)
            ->paginate(9);

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
        $acuerdo = new Acuerdo;
        $categorias = Categoria::orderBy('nombre_categoria', 'ASC')->pluck('nombre_categoria', 'id');
        $users = User::select(\DB::raw('CONCAT(name, " ", apellido_paterno, " - ", rut) AS full_name, id'))->pluck('full_name', 'id');

        return view('reuniones.create', compact('reunion', 'users', 'categorias', 'acuerdo'));
    }


    public function all()
    {
        $reuniones = Reunion::latest();

        return redirect()->route('all', compact('reuniones'));
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
        //Mail::to($reunion->users()->pluck('email'))->send(new notificarParticipanteMail());
        //dd($reunion->users()->pluck(['email']) );

        event(new newReunionHasCreatedEvent($reunion));
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reunion::destroy($id);
        return redirect('reuniones')->withErrors('Registro eliminado con exito!');
    }
}
