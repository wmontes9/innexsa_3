<div class="modal fade" id="editReto">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="text-center">Editar Reto</h3>					
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <form :action="'{{url("retos/actualizar")}}' + '/' + fillReto.id" enctype="multipart/form-data" id="formUpdateReto" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Encabezado</label>
                                {{-- <input type="hidden" value="" id="ruta" class="form-control"> --}}
                                <input type="text" name="enunciado" v-model="fillReto.enunciado" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control" rows="2" name="descripcion" v-model="fillReto.descripcion" required>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <input type="file" id="url_imagen_e" name="url_imagen_e"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Imagen</label>
                                <img :src="'{{asset('storage/imgReto')}}' +'/'+ fillReto.url_imagen" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>                                                                               
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>