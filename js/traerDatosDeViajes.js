
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
			var latitud = $('#latitud').val();
			var longitud = $('#longitud').val();
			$('#latitud').remove();
			$('#longitud').remove();
		    var mapOptions = {
		        center:new google.maps.LatLng(latitud,longitud),
		        zoom:12,
		        panControl: false,
		        zoomControl: false,
		        scaleControl: false,
		        mapTypeControl:false,
		        streetViewControl:true,
		        overviewMapControl:true,
		        rotateControl:true,
		        mapTypeId:google.maps.MapTypeId.ROADMAP
		    };

		    var map = new google.maps.Map(document.getElementById('mapa'),mapOptions);

		    var marker = new google.maps.Marker({
		        position: new google.maps.LatLng(latitud,longitud),
		        map: map
		    });
				}
			});
}
