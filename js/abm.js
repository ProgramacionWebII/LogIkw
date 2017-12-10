function extender(){
	$("#eliminar").click(function(event){
		$("#modificar").remove();
	});
	
	$("#modificar").click(function(event){
		$("#eliminar").remove();
	});
}
function cambiarAtributos(){
	var usuario = $("#usuario").val();
	switch(usuario){
		case 'administrador':
		if(typeof $("#chofer").val() != 'undefined'){
			$("#chofer").remove();
		}
		else if(typeof $("#cliente").val() != 'undefined'){
			$("#cliente").remove();
		}
		else if(typeof $("#mecanico").val() != 'undefined'){
			$("#mecanico").remove();
		}
		else if(typeof $("#empresa").val() != 'undefined'){
			$("#empresa").remove();
		}
		$("#agregarAtributos").append(
			"<div id='administrador'><input type='text' name='nombre' id='nombre' class='col-sm-6 form-control' placeholder='Nombre' required><br>"+
   	        "<input type='text' name='apellido' id='apellido' class='col-sm-6 form-control' placeholder='Apellido' required><br>"+
   	        "<input type='text' name='dni' id='dni' class='col-sm-6 form-control' placeholder='DNI' required><br>"+
   	        "<input type='text' name='telefono' id='telefono' class='col-sm-6 form-control' placeholder='Telefono' required><br>"+
   	        "<input type='text' name='domicilio' id='domicilio' class='col-sm-6 form-control' placeholder='Domicilio' required><br>"+
   	        "<input type='text' name='email' id='email' class='col-sm-6 form-control' placeholder='E-Mail' required><br></div>");
		break;
		case 'chofer':
		if(typeof $("#administrador").val() != 'undefined'){
			$("#administrador").remove();
		}
		else if(typeof $("#cliente").val() != 'undefined'){
			$("#cliente").remove();
		}
		else if(typeof $("#mecanico").val() != 'undefined'){
			$("#mecanico").remove();
		}
		else if(typeof $("#empresa").val() != 'undefined'){
			$("#empresa").remove();
		}
		$("#agregarAtributos").append(
			"<div id='chofer'><input type='text' name='nombre' id='nombre' class='col-sm-6 form-control' placeholder='Nombre' required><br>"+
   	        "<input type='text' name='apellido' id='apellido' class='col-sm-6 form-control' placeholder='Apellido' required><br>"+
   	        "<input type='text' name='dni' id='dni' class='col-sm-6 form-control' placeholder='DNI' required><br>"+
   	        "<input type='date' name='fecha_nacimiento' id='fecha' class='col-sm-6 form-control' required><br>"+
   	        "<input type='text' name='tipo_licencia' id='fecha' class='col-sm-6 form-control' placeholder='Tipo de licencia' required><br></div>");
		break;
		case 'cliente':
		if(typeof $("#administrador").val() != 'undefined'){
			$("#administrador").remove();
		}
		else if(typeof $("#chofer").val() != 'undefined'){
			$("#chofer").remove();
		}
		else if(typeof $("#mecanico").val() != 'undefined'){
			$("#mecanico").remove();
		}
		else if(typeof $("#empresa").val() != 'undefined'){
			$("#empresa").remove();
		}
		$("#agregarAtributos").append(
			"<div id='cliente'><input type='text' name='nombre' id='nombre' class='col-sm-6 form-control' placeholder='Nombre' required><br>"+
   	        "<input type='text' name='razon_social' id='razon_social' class='col-sm-6 form-control' placeholder='Razon Social' required><br>"+
   	        "<input type='text' name='telefono' id='telefono' class='col-sm-6 form-control' placeholder='Telefono' required><br>"+
   	        "<input type='text' name='domicilio' id='domicilio' class='col-sm-6 form-control' placeholder='Domicilio' required><br>"+
   	        "<input type='email' name='email' id='email' class='col-sm-6 form-control' placeholder='E-Mail' required><br></div>");
		break;
		case 'mecanico':
		if(typeof $("#administrador").val() != 'undefined'){
			$("#administrador").remove();
		}
		else if(typeof $("#chofer").val() != 'undefined'){
			$("#chofer").remove();
		}
		else if(typeof $("#cliente").val() != 'undefined'){
			$("#cliente").remove();
		}
		else if(typeof $("#empresa").val() != 'undefined'){
			$("#empresa").remove();
		}
		$("#agregarAtributos").append(
			"<div id='mecanico'><input type='text' name='nombre' id='nombre' class='col-sm-6 form-control' placeholder='Nombre' required><br>"+
   	        "<input type='text' name='apellido' id='apellido' class='col-sm-6 form-control' placeholder='Apellido' required><br>"+
   	        "<input type='text' name='dni' id='dni' class='col-sm-6 form-control' placeholder='DNI' required><br></div>");
		break;
		case 'empresa':
		if(typeof $("#administrador").val() != 'undefined'){
			$("#administrador").remove();
		}
		else if(typeof $("#chofer").val() != 'undefined'){
			$("#chofer").remove();
		}
		else if(typeof $("#mecanico").val() != 'undefined'){
			$("#mecanico").remove();
		}
		else if(typeof $("#cliente").val() != 'undefined'){
			$("#cliente").remove();
		}
		$("#agregarAtributos").append(
			"<div id='empresa'><input type='text' name='nombre' id='nombre' class='col-sm-6 form-control' placeholder='Nombre' required><br>"+
   	        "<input type='text' name='telefono' id='telefono' class='col-sm-6 form-control' placeholder='Telefono' required><br>"+
   	        "<input type='text' name='domicilio' id='domicilio' class='col-sm-6 form-control' placeholder='Domicilio' required><br></div>");
		break;
	};
}

function cambiarRol(){
	var rol = $("#rol").val();
	$("#opt").remove();
	$("#rol").append(
		"<option id='opt'>administrador</option>"+
		"<option id='opt'>chofer</option>"+
		"<option id='opt'>cliente</option>"+
		"<option id='opt'>empresa</option>"+
		"<option id='opt'>mecanico</option>"
		);
}