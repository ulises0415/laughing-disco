<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*metodo para mostrar los datos de la tabla*/
        $datos_estado_civil=EstadoCivil::all(); //metodo para sacar los datos de la tabla estado civil
        //dd($datos_estado_civil);
        return view("estadocivil.index",compact("datos_estado_civil")); //se retorna la vista con las variables que contienen los datos
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
        $request->validate([
            'descripcion' => 'required'
        ]);

        $datos_estado_civil = $request->all();
        EstadoCivil::create($datos_estado_civil); //metodo para guardar los datos en la variable
        return redirect()->route('estadocivil.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoCivil $estadocivil)
    {
        //
        return back()->with(["modal_delete"=>true,"delete_estadocivil"=>$estadocivil]); //con with se mandan datos por sesion
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoCivil $estadocivil)
    {
        //
        //dd($estadocivil);
        return back()->with(["modal_edit"=>true,"edit_estadocivil"=>$estadocivil]); //con with se mandan datos por sesion
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoCivil $estadocivil)
    {
        //
        $request->validate([
            'descripcion' => 'required|alpha'
        ]);

        $estadocivil->update($request->all());
        return redirect('estadocivil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstadoCivil  $estadoCivil
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoCivil $estadocivil)
    {
        //
        $estadocivil->delete();
        return redirect('estadocivil');
    }
}
