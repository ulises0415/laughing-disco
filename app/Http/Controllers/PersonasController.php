<?php

namespace App\Http\Controllers;

use App\Models\Carreras;
use App\Models\EstadoCivil;
use App\Models\Personas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*metodo para mostrar los datos de la tabla*/

             //dd($datos_personas);
        /* select para sacar datos de una tabla
        $datos_personas=DB::select("SELECT personas.id_persona, personas.nombre, personas.apellidos, personas.direccion, personas.correo, estado_civil.descripcion FROM
        personas, estado_civil WHERE personas.id_persona=estado_civil.id_estado_civil; ");
        */

        //join entre la tabla estado civil y personas en el campo id_estado_civil, con get sacamos los datos de la coleccion
        $datos_personas=Personas::join("estado_civil","personas.id_estado_civil","estado_civil.id_estado_civil")
            ->join("carreras","personas.id_carrera","carreras.id_carrera")
        ->select("personas.*","estado_civil.descripcion","carreras.carrera")
            ->get();
        //dd($datos_personas);
        //join entre la tabla carreras y personas en el campo id_carrera, con get sacamos los datos de la coleccion
       /* $datos_carreras=Carreras::join("carreras","personas.id_carrera","carreras.id_carrera")
            ->select("personas.*","carreras.carrera")->get();*/

        //$datos_personas=Personas::all(); //metodo para sacar los datos de la tabla personas
        //dd($datos_estado_civil);
        $datos_estado_civil=EstadoCivil::all(); //metodo para sacar los datos de la tabla estado civil
        $datos_carreras=Carreras::all(); //metodo para sacar los datos de la tabla carreras
        //dd($datos_carreras);
        return view("personas.index",compact("datos_personas","datos_estado_civil","datos_carreras")); //se retorns la vista con las variables que contienen los datos
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
        //$datosPersonas = request()->except('_token');
        //dd($request->all());
        //Personas::insert($datosPersonas);

        $request->validate([
            'nombre' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'apellidos' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'id_estado_civil' => 'required',
            'id_carrera' => 'required',
            'direccion' => 'required|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'correo' => 'required|email',
            'password' => [
                Password::min(5)
                    ->letters()
                    //->mixedCase()
                    ->numbers()
                    ->symbols()
                    //->uncompromised()
            ]
        ]);
        $datosPersonas = $request->all();
        Personas::create($datosPersonas); //metodo para guardar los datos en la variable
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $persona) //la variable se debe llamar como en el databidding
    {
        //
        //dd($persona);
        return back()->with(["modal_delete"=>true,"delete_persona"=>$persona]); //con with se mandan datos por sesion
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $persona) //la variable debe coincidir con el data bidding de la ruta
    {
        //
        //$persona=Personas::findOrfail($id_personas);
       //return view('personas.edit', compact('persona'));
        //dd($persona);
        return back()->with(["modal_edit"=>true,"edit_persona"=>$persona]); //con with se mandan datos por sesion
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $persona)
    {
        //
        /*
        $datosPersonas = request()->except(['_token','_method']);
        Personas::where('id_persona','=',$id_persona)->update($datosPersonas);

        $persona=Personas::findOrfail($id_persona);
        return view('personas.index', compact('persona'));
        return back();
        */
        //dd("hola");

        $request->validate([
            'nombre' => 'required|alpha'
        ]);

        $persona->update($request->all());
        return redirect('personas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $persona)
    {
        //
        $persona->delete();
        return redirect('personas');
    }
}
