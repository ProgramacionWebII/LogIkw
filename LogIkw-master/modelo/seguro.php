<?PHP
session_start();
include "conexion.php";
 include "login.php";   

if (!isset($_SESSION['administrador'])) 
	

session_destroy();
		header("Location: ../index.php");
		
}

?>

