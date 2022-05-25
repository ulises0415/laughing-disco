@extends("layouts.template")

@section("title_section")
    Personas
@endsection

@section("content")
<div class="row mt-5">
    <div class="col">
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#crearpersonamodal">Nuevo</a>
    </div>
</div>

<table class="table">
     <thead class="thead-light">
        <tr>
             <th scope="col">#</th>
             <th scope="col">Nombre</th>
             <th scope="col">Apellidos</th>
             <th scope="col">Estado Civil</th>
             <th scope="col">Carrera</th>
             <th scope="col">Direccion</th>
             <th scope="col">Correo</th>
        </tr>
        </thead>
        <tbody>
             @foreach($datos_personas as $persona)
            {{--{{dd($persona)}}--}}
            <tr>

                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$persona->nombre}}</td>
                <td>{{$persona->apellidos}}</td>
                <td>{{$persona->descripcion}}</td>
                <td>{{$persona->carrera}}</td>
                <td>{{$persona->direccion}}</td>
                <td>{{$persona->correo}}</td>
                  <td>
                  <td>
                    {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                    {{--<button type="button" data-bs-toggle = "modal" data-bs-target = "#modal-edit"  data-placement="bottom" title="Editar" type="button" class="btn btn-sm btn-success"><i class="far fa-edit"></i></button>--}}
                    <a href="{{route("personas.edit",$persona->id_persona)}}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                  </td>
                  <td>
                      {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                      <a href="{{route("personas.show",$persona->id_persona)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      {{--
                     <button type="button" data-bs-toggle = "modal" data-bs-target = "#confirm-delete{{ $persona->id_persona}}"  data-placement="left" title="Eliminar " type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        <div class="modal fade" id="confirm-delete{{ $persona->id_persona}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                            Eliminar Registro
                                      </div>
                                      <div class="modal-body">
                                            Esta seguro de Eliminar este Registro?
                                      </div>
                                      <div class="modal-footer" >
                                        <form action="{{route('personas.destroy',$persona->id_persona)}}" method="POST">
                                          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                          <button type="submit" class="btn btn-danger " >Eliminar</button>
                                        </form>
                                      </div>
                                </div>
                            </div>
                        </div>
                        --}}
                  </td>
            </tr>
            @endforeach
</table>
{{--incluir las vistas donde estan los datos--}}
@include("personas.create")

@if(session("modal_edit"))
    @include("personas.edit")
@endif

@if(session("modal_delete"))
    @include("personas.delete")
@endif

{{--condicion para diferenciar los metodos agregar y editar--}}
    @if((Session::has("_old_input")))   {{--has compara si existe el parametro proporcionado--}}
        @if(array_key_exists("_method",Session::get("_old_input"))) {{--::get es una llamada a un metodo abstracto para sacar el valor del parametro que recibe--}}
            mensaje desde la validacion de editar
            {{--dd(session()->all())--}}
            @include("personas.edit")
        @else
            mensaje de validacion desde crear
            {{--recargar el modal si es que existe un error de validacion en algun dato--}}
            @section("scripts")
                <script type="text/javascript">
                    new bootstrap.Modal(document.getElementById('crearpersonamodal')).show();
                </script>
            @endsection
        @endif
    @endif

@endsection

