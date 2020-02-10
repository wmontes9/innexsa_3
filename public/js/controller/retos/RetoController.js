new Vue({
    created:function(){
        app.cargando();
        this.getListaRetos();
    },
    el:"#retos",
    data:{
        fillReto:{"id":"","enunciado":"","descripcion":"","url_imagen":""},
        retos:null,
    },
    methods:{
        getListaRetos:function(){
            let url = "/retos/listaRetos";
            axios.get(url).then(responce => {
                this.retos = responce.data;                
                app.finalCarga();
            });                        
        },
        editarReto:function(reto){
			this.fillReto.id = reto.id_reto;
			this.fillReto.enunciado = reto.enunciado;
			this.fillReto.descripcion = reto.descripcion;
			this.fillReto.url_imagen = reto.url_imagen;		
			$("#editReto").modal("show");
        },
        eliminarReto:function(reto){
			var url = "eliminar/" + reto;
			axios.delete(url).then(response=>{                    				
				if(response.data != 0){
					$.sweetModal({
						content: 'No se ha podido eliminar ya que tiene soluciones  asociadas',
						icon: $.sweetModal.ICON_WARNING
					});
				}else{
						$.sweetModal({
							content: 'Reto eliminado correctamente',
							icon: $.sweetModal.ICON_SUCCESS
					});
					this.getListaRetos();
				}
			});
		},
    }
});