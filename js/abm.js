function modificar(){
	$("#modificar").click(function(event){
		$("#eliminar").remove();
	});
}

function eliminar(){
	$("#eliminar").click(function(event){
		$("#modificar").remove();
	});
}

function extender(){
	$("#eliminar").click(function(event){
		$("#modificar").remove();
	});
	
	$("#modificar").click(function(event){
		$("#eliminar").remove();
	});
}