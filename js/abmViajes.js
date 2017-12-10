
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

function eliminarViaje(){
	var id = $("#viajeNro").val();
	var eliminar = $("#eliminar").val();
	var parametro = {'id' : id, 'eliminar' : 'eliminar'};
	$.ajax({
		data : parametro,
		url : '../../modelo/ejecutarAbmViajes.php',
		type: 'POST',
		beforeSend: function(){
			$('#viajeNro'+id).html(
				"<p> Su petición está siendo procesada </p>"
				)
		}
	});
}