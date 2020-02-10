new Vue({
	el:"#appRetos",
	created:function(){
		this.getRetos();
	},
	data:{
		fillReto:{"id_reto":"","enunciado":"","descripcion":"","url_imagen":""},
		retos:[],
		enunciado:"",
		descripcion:"",
		url_imagen:"",
		file:"",

	},
	methods:{
		getRetos:function(){
			var url = "/admin/getretos";
			axios.get(url).then(response=>{
			  this.retos = response.data
			});
			},
			createReto:function(){
				var url = "retos";
				axios.post(url,{
					enunciado:this.enunciado,
					descripcion:this.descripcion,
					url_imagen:this.url_imagen,       
				}).then(response=>{
					this.getRetos();
					$("#newReto").modal("hide");
					this.enunciado = "";
					this.descripcion = "";
					this.url_imagen = "";
				});
			},
			editReto:function(reto){
				this.id_reto = reto.id_reto;
				this.fillReto.id_reto = reto.id_reto;
				this.fillReto.enunciado = reto.enunciado;
				this.fillReto.descripcion = reto.descripcion;
				this.fillReto.url_imagen = reto.url_imagen;
				var ruta = $("#ruta").val();
            	var url = ruta+""+this.id_reto;
            	$("#formUpdateReto").attr("action",url);
				$("#editReto").modal("show");
			},
			deleteReto:function(reto){
				var url = "retos/"+reto;
		    	axios.delete(url).then(response=>{                    
                    //$("#detailcompetencia").modal("hide");
                    if(response.data != 0){
						$.sweetModal({
							content: 'No se ha podido eliminar ya que tiene soluciones  asociadas ',
							icon: $.sweetModal.ICON_WARNING
						});
                   }else{
                      	 $.sweetModal({
                             content: 'Reto eliminado correctamente',
                             icon: $.sweetModal.ICON_SUCCESS
                     	});
                     	this.getRetos();
                   }
		    	});
			},
			soluciones:function($id){
				var url = "solucion/"+$id
					axios.get(url).then(response=>{
						$(location).attr("href","solucion");
					});
			},
			publicarReto:function(id){
				if(confirm('esta segur@ de publicar el reto?')){
					var url = "/admin/retos/publicar/" + id;
					axios.get(url).then(responce => {
						alert('reto publicado');
					});
				}
			}
    },
  });