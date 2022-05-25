<!-- Modal para actualizar registros-->
<div class="modal fade" id="modal-edit" role="dialog">
    <div class="modal-dialog">

        @php
            //$edit_persona = session("edit_persona");
            $edit_persona = Session::has("edit_persona") ? session("edit_persona") : Session::get("_old_input");
        @endphp

        <!-- Modal content-->
        <form method="POST"  action="{{url('/personas/'.(isset($edit_persona->id_persona) ? $edit_persona->id_persona : $edit_persona["id_persona"]))}}" role="form" enctype="multipart/form-data">
            <div class="modal-content">
                <input type="hidden" value="{{isset($edit_persona->id_persona) ? $edit_persona->nombre : $edit_persona["id_persona"]}}" name="id_persona">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <section class="content container-fluid">
                        <div class="row">
                            <div class="col-md-13">
                                @includeif('partials.errors')
                                <div class="card card-default">
                                    <div class="card-body">

                                            <div class="box box-info padding-1">
                                                <div class="box-body">
                                                    {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}

                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" name="nombre" value="{{isset($edit_persona->nombre) ? $edit_persona->nombre : $edit_persona["nombre"]}}" class="form-control{{$errors->has('nombre') ? ' is-invalid' : ''}}" placeholder="Nombre">
                                                        @if($errors->has('nombre')) {{--creacion de un span en caso de existir error--}}
                                                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                            <label for="apellidos">Apellidos</label>
                                                            <input type="text" name="apellidos" value="{{isset($edit_persona->apellidos) ? $edit_persona->apellidos : $edit_persona["apellidos"]}}" class="form-control{{$errors->has('apellidos') ? ' is-invalid' : ''}}" placeholder="Apellidos">
                                                        @if($errors->has('apellidos')) {{--creacion de un span en caso de existir error--}}
                                                            <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="estado_civil">Estado Civil</label>
                                                        <select name="id_estado_civil" class="form-control{{$errors->has('id_estado_civil') ? ' is-invalid' : ''}}" placeholder="Estado Civil">
                                                            <option value="" selected disabled>Selecciona un valor</option>

                                                            @foreach($datos_estado_civil as $estado_civil)
                                                                <option value="{{$estado_civil->id_estado_civil}}" {{(isset($edit_persona->id_estado_civil) ? $edit_persona->id_estado_civil : $edit_persona["id_estado_civil"]) == $estado_civil->id_estado_civil ? "selected":""}}>{{$estado_civil->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('id_estado_civil')) {{--creacion de un span en caso de existir error--}}
                                                            <span class="text-danger">{{ $errors->first('id_estado_civil') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="carrera">Carrera</label>
                                                        <select name="id_carrera" class="form-control{{$errors->has('id_carrera') ? ' is-invalid' : ''}}" placeholder="Carrera">
                                                            <option value="" selected disabled>Selecciona un valor</option>

                                                            @foreach($datos_carreras as $carrera)
                                                                <option value="{{$carrera->id_carrera}}" {{(isset($edit_persona->id_carrera) ? $edit_persona->id_carrera : $edit_persona["id_carrera"]) == $carrera->id_carrera ? "selected":""}}>{{$carrera->carrera}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('id_carrera')) {{--creacion de un span en caso de existir error--}}
                                                        <span class="text-danger">{{ $errors->first('id_carrera') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="direccion">Direccion</label>
                                                        <input type="text" name="direccion" value="{{isset($edit_persona->direccion) ? $edit_persona->direccion : $edit_persona["direccion"]}}" class="form-control{{$errors->has('direccion') ? ' is-invalid' : ''}}" placeholder="Direccion">
                                                        @if($errors->has('direccion')) {{--creacion de un span en caso de existir error--}}
                                                            <span class="text-danger">{{ $errors->first('direccion') }}</span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="correo">Correo</label>
                                                        <input type="text" name="correo" value="{{isset($edit_persona->correo) ? $edit_persona->correo : $edit_persona["correo"]}}" class="form-control{{$errors->has('correo') ? ' is-invalid' : ''}}" placeholder="Correo">
                                                        @if($errors->has('correo')) {{--creacion de un span en caso de existir error--}}
                                                            <span class="text-danger">{{ $errors->first('correo') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{--script para lanzar el modal--}}
@section("scripts")
    <script type="text/javascript">
        new bootstrap.Modal(document.getElementById('modal-edit')).show();
    </script>
@endsection

