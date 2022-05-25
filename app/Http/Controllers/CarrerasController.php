<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use Illuminate\Http\Request;


class CarrerasController extends Controller
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
        $datos_carreras=Carreras::all(); //metodo para sacar los datos de la tabla carreras
        //dd($datos_estado_civil);
        //se retorna la vista con las variables que contienen los datos
        return view("carreras.index",compact("datos_carreras"));
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
            'carrera' => 'required'
        ]);
        $datos_carreras = $request->all();
        Carreras::create($datos_carreras); //metodo para guardar los datos en la variable
        return redirect()->route('carreras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function show(Carreras $carrera)
    {
        //
        return back()->with(["modal_delete"=>true,"delete_carrera"=>$carrera]); //con with se mandan datos por sesion
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function edit(Carreras $carrera)
    {
        //
        return back()->with(["modal_edit"=>true,"edit_carrera"=>$carrera]); //con with se mandan datos por sesion
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carreras $carrera)
    {
        //
        $request->validate([
            'carrera' => 'required|alpha'
        ]);

        $carrera->update($request->all());
        return redirect('carreras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carreras  $carreras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carreras $carrera)
    {
        //
        $carrera->delete();
        return redirect('carreras');
    }
}
