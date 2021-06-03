<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\StoreCategoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->paginate(8);

        return view('categorias.index', compact('categorias'))->with('fireAlert', true);

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
     * @param  StoreCategoria  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoria $request)
    {
        $categoria = Categoria::updateOrCreate($request->except('_token'));

        return back()->withSuccess('Categoria creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id)
            ->update($request->except('_token'));

        return redirect()->route('categorias.index')->with('success', 'Cambios relizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id)->delete();

        return redirect()->route('categorias.index')->with('danger', 'Eliminado exitosamente');

    }
}
