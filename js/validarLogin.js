function validarLogin() {
	
	var usuario=document.miformulario.usuario.value;
	var password=document.miformulario.password.value;


        	if (usuario.length==0 || usuario=="" || password.length==0 || password=="")
        { 
            document.getElementById('error').innerHTML = "usuario o contraseña no válida";
			usuario.focus();
            return false;
        }
	document.miformulario.submit(); 
        }

   