@extends("layouts.template")

@section("title_section")
    Estado Civil
@endsection

@section("content")
    <div class="row mt-5">
        <div class="col">
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_agregar">Nuevo</a>
        </div>
    </div>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion</th>
        </tr>
        </thead>
        <tbody>
        @foreach($datos_estado_civil as $estadocivil)
            <tr>

                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$estadocivil->descripcion}}</td>
                <td>
                <td>
                    {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                    {{--<button type="button" data-bs-toggle = "modal" data-bs-target = "#modal-edit"  data-placement="bottom" title="Editar" type="button" class="btn btn-sm btn-success"><i class="far fa-edit"></i></button>--}}
                    <a href="{{route("estadocivil.edit",$estadocivil->id_estado_civil)}}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                </td>
                <td>
                    {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                    <a href="{{route("estadocivil.show",$estadocivil->id_estado_civil)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
    @include("estadocivil.create")

    @if(session("modal_edit"))
        @include("estadocivil.edit")
    @endif

    @if(session("modal_delete"))
        @include("estadocivil.delete")
    @endif

    {{--condicion para diferenciar los metodos agregar y editar--}}
    @if((Session::has("_old_input")))   {{--has compara si existe el parametro proporcionado--}}
    @if(array_key_exists("_method",Session::get("_old_input"))) {{--::get es una llamada a un metodo abstracto para sacar el valor del parametro que recibe--}}
    mensaje desde la validacion de editar
    {{--dd(session()->all())--}}
    @include("estadocivil.edit")
    @else
        mensaje de validacion desde crear
        {{--recargar el modal si es que existe un error de validacion en algun dato--}}
@section("scripts")
    <script type="text/javascript">
        new bootstrap.Modal(document.getElementById('modal_agregar')).show();
    </script>
@endsection
@endif
@endif

@endsection

