<?php
	class Vehiculo{

		/* Se usa el método que más convenga, si necesito todos los clientes, uso el primero,
		si necesito un cliente en específico, filtro por ID usando el segundo méetodo */
		public static function getAll(){
			$query = "SELECT * FROM vehiculo";
			return $query;
		}

		public static function getAllForId($id){
			$query = "SELECT * FROM vehiculo WHERE id = $id";
			return $query;
		}




		public static function insertar($patente, $nro_chasis, $nro_motor, $marca, $modelo, $anio_fabricacion, $tipo , $estado){
			$query = "INSERT INTO vehiculo(patente, nro_chasis ,nro_motor,marca,modelo, anio_fabricacion , tipo, estado)
			VALUES ('$patente', $nro_chasis, $nro_motor,'$marca', '$modelo', $anio_fabricacion , '$tipo','$estado')";
			return $query;
		}

		public static function eliminar($id){
			$query = "DELETE FROM vehiculo WHERE id = $id";
			return $query;
		}

	public static function actualizar($id,$patente, $nro_chasis, $nro_motor, $marca, $modelo, $anio_fabricacion, $tipo,$estado){
			$query = "UPDATE vehiculo
			SET
			patente = '$patente',
			nro_chasis = $nro_chasis,
			nro_motor = $nro_motor,
			marca = '$marca',
			modelo = '$modelo',
			anio_fabricacion = $anio_fabricacion,
			tipo = '$tipo',
			estado = '$estado'
		
			WHERE id = $id";
			return $query;
		}
	}
?>