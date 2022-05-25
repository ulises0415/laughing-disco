{{--modal delete solo un modal para todos los registros--}}
@php
    $delete_carrera = session("delete_carrera");
@endphp
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('carreras.destroy',$delete_carrera->id_carrera)}}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    Eliminar Registro
                </div>
                <div class="modal-body">
                    ¿Esta seguro de eliminar el registro {{$delete_carrera->carrera}}?
                </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger " >Eliminar</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--script para lanzar el modal--}}
@section("scripts")
    <script type="text/javascript">
        new bootstrap.Modal(document.getElementById('modal-delete')).show();
    </script>
@endsection
