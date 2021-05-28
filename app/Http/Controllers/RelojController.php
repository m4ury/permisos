<?php

namespace App\Http\Controllers;

use App\Reloj;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RelojController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $problems = $user->problems()
            ->latest()->paginate(5);

        return view('problems.index', compact('problems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $problem = new Reloj;
        return view('problems.create', compact('problem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['fecha_problema' => 'required|date', 'comentario_problema' => 'required|string|min:5']);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $problem = Reloj::create($request->except('_token'));
        return redirect('problems')->withToastSuccess('Registrado con Exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problems = Reloj::findOrFail($id);

        $view = view('problems.show', compact('problems'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter', 'portrait')->setWarnings(false);

        return $pdf->stream('problema_' . $problems->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reloj  $reloj
     * @return \Illuminate\Http\Response
     */
    public function edit(Reloj $reloj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reloj  $reloj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reloj $reloj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Reloj::destroy($id);
        return redirect('problems')->withErrors('Registro eliminado con exito!');
    }
}
