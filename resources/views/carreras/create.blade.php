<!-- Modal para insertar datos-->
<div class="modal fade" id="modal_agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('carreras.store') }}"  role="form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="box box-info padding-1">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="carrera">Descripcion</label>
                                <input type="text" name="carrera" class="form-control{{$errors->has('carrera') ? ' is-invalid' : ''}}" placeholder="Descripcion">
                                @if($errors->has('carrera')) {{--creacion de un span en caso de existir error--}}
                                <span class="text-danger">{{ $errors->first('carrera') }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
