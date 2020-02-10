<div id="crearReto" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center w-50">Formular Reto</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('guardarRetoUsuario')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="enunciado">Enunciado</label>
                        <input type="text" name="enunciado" id="enunciado" class="form-control" required>    
                    </div>    
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Imagen</label>
                        <input type="file" name="url_imagen" id="img" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Guardar Reto</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>