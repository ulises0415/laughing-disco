@extends("layouts.template")
@section("content")
<div class="row mt-5">
    <div class="col">
    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#creardatomodal">Nuevo</a>
    </div>
</div>

<table class="table">
     <thead class="thead-light">
        <tr>
             <th scope="col">#</th>
             <th scope="col">Correo</th>
             <th scope="col">Sexo</th>
             <th scope="col">Estado civil</th>
             <th scope="col">Edad</th>
             <th scope="col">Numero de hijos</th>
             <th scope="col">Experiencia <br>laboral</th>
             <th scope="col">Antiguedad en el tesvb</th>
             <th scope="col">Grado estudio</th>
        </tr>
        </thead>
        <tbody>
             @foreach($info_dato as $dato)
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$dato->dato_correo}}</td>
                <td>{{$dato->sexo}}</td>
                <td>{{$dato->estado_civil}}</td>
                <td>{{$dato->edad}}</td>
                <td>{{$dato->num_hijos}}</td>
                <td>{{$dato->experiencia}}</td>
                <td>{{$dato->antiguedad}}</td>
                <td>{{$dato->grado_estudio}}</td>
                  <td>
                  <td>
                    {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                    {{--<button type="button" data-bs-toggle = "modal" data-bs-target = "#modal-edit"  data-placement="bottom" title="Editar" type="button" class="btn btn-sm btn-success"><i class="far fa-edit"></i></button>--}}
                    <a href="{{route("datos.edit",$dato->id_dato)}}" class="btn btn-sm btn-success"><i class="far fa-edit"></i></a>
                  </td>
                  <td>
                      {{--boton para editar primero debe conocer cual es el id que se desea editar entrando al metodo edit--}}
                      <a href="{{route("datos.show",$dato->id_dato)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                      {{--
                     <button type="button" data-bs-toggle = "modal" data-bs-target = "#confirm-delete{{ $dato->id_dato}}"  data-placement="left" title="Eliminar " type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        <div class="modal fade" id="confirm-delete{{ $dato->id_dato}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                            Eliminar Registro
                                      </div>
                                      <div class="modal-body">
                                            Esta seguro de Eliminar este Registro?
                                      </div>
                                      <div class="modal-footer" >
                                        <form action="{{route('datos.destroy',$dato->id_dato)}}" method="POST">
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