
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
		}
	});
}
