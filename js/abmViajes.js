
function infoExtendida(id){
	var id = id;
	var parametro = { 'id' : id};
	$('#headTable').remove();
	$.ajax({
		data : parametro,
		url : '../../modelo/infoExtendidaViaje.php',
		type: 'POST',
		beforeSend: function(){
			$('#viajeNro'+id).html(
				"<p> Su petición está siendo procesada </p>"
				)
		},
		success: function(response){
			$('.table-condensed').html(response);
			$('#botonRegresar').html(
				'<button type="submit" onclick= "regresar()" class="btn btn-danger">Regresar</button>'
				);
		}
	});
}

function generarQr(){
	id = $('#qr').val();
	parametro = { 'id' : id};
	$('#headTable').remove();
	$.ajax({
		data : parametro,
		url : 'generador_qr.php',
		type: 'POST',
		beforeSend: function(){
			$('#viajeNro'+id).html(
				"<p> Su petición está siendo procesada </p>"
				)
		},
		success: function(response){
			$('.table-condensed').html(response);
			$('#botonRegresar').html(
				'<button class="btn btn-danger col-sm-6" onclick= "(regresar())">Regresar</button>'
			);
			$('#botonDescargar').html(
				'<button class="btn btn-primary col-sm-6" onclick="(descargar())">Descargar</button>'
				);
		}
	});

}

function regresar(){
	location.reload();
}

function descargar(){
	url = '../modelo/generarPDF.php',
	window.location.href = url;
}

/*function validarEstado(){
	var validarC = $("#noDisponibleC").val();
	var validarV = $("#noDisponibleV").val();
	if(typeof validarC != 'undefined' && typeof validarV != 'undefined'){
		$("#form").remove();
		alert("No hay choferes ni coches disponibles");
	}
	else if(typeof validarC == 'undefined'){
		$("#form").remove();
		alert("No hay choferes disponibles");
	}
	else if(typeof validarV == 'undefined'){
		$("#form").remove();
		alert("No hay choches disponibles");
	}
}*/