
var id = $('#idViaje').val();
var parametro = { 'id' : id};
var idPeticion = "#viajeNro"+id;

function infoExtendida(){
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
				'<button class="btn btn-danger col-sm-6" onclick= "(regresar())">Regresar</button>'+
				'<button class="btn btn-primary col-sm-6" onclick="(descargar())">Descargar</button>'
				);
		}
	});

}

function regresar(){
	location.reload();
}

function descargar(){
		$.ajax({
		data : 1,
		url : '../modelo/generarPDF.php',
		type: 'POST'
		}
	});
}