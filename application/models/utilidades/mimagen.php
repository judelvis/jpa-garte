<?php
/**
 *
 * @subpackage fisico
 * @author Judelvis Rivas
 * @since Version 1.0
 *
 */
class MImagen extends CI_Model {
	var $directorio;
	var $nombre;
	var $tipo;
	var $tamano;
	var $temporal;
	var $ruta;
	function __construct() {
		parent::__construct ();
	}
	function cargar($archivo, $ruta) {
		$this->directorio = $ruta;
		$this->nombre = $_FILES ['imagen'] ['name'];
		$this->tipo = $_FILES ['imagen'] ['type'];
		$this->tamano = $_FILES ['imagen'] ['size'];
		$this->temporal = $_FILES ['imagen'] ['tmp_name'];
		return $this;
	}
	function evaluar() {
	}
	function salvar() {
		$this->ruta = $this->directorio . '/' . $this->nombre;
		if (! move_uploaded_file ( $this->temporal, $this->ruta )) {
			$arr = FALSE;
		} else {
			$arr = TRUE;
		}
		$t = $this -> crearThumbnail2($this->ruta, $this->directorio . '/miniatura/' . $this->nombre, 100, 75);
		$t2 = $this -> crearThumbnail2($this->ruta, $this->directorio . '/medio/' . $this->nombre, 270, 200);
		$res['respuesta'] = $arr;
		$res['mensaje'] = $t.$t2;
		return $res;
	}
	
	
	function busca_imagenes($oidi) {
		$this->load->database ();
		$obj = array ();
		$imagenes = array ();
		$obser = array ();
		$consulta = $this->db->query ( "SELECT * FROM galeria where oidi=" . $oidi );
		// print("<pre>");
		// print_R($consulta -> result());
		$rsConsulta = $consulta->result ();
		// $obj['resp'] = 1;
		if ($consulta->num_rows () > 0) {
			$obj ['resp'] = 1;
			$i = 0;
			foreach ( $rsConsulta as $fila ) {
				$imagenes [$i] = $fila->imagen;
				$i ++;
			}
			$obj ['imagenes'] = $imagenes;
		}
		$query = 'SELECT inmueble.id as idinmu,refe,precio,tama,ubica,detalle,
estado.estado as znomb,ciudad.ciudad as cnomb,tipo.tipo as tnomb,servicios,banos,habita,estaciona,ubica,direc
  	FROM inmueble
  	join estado on estado.id=inmueble.estado
  	join ciudad on ciudad.id=inmueble.ciudad
  	join tipo on tipo.id=inmueble.tipo where inmueble.id=' . $oidi;
		$consulta = $this->db->query ( $query );
		$obj ['datos'] = $consulta->result ();
		unset ( $this->db );
		return $obj;
		// return "llega";
	}
	
	function crearThumbnail2($nombreImagen, $nombreThumbnail, $nuevoAncho, $nuevoAlto) {
		
		// Obtiene las dimensiones de la imagen.
		list ( $ancho, $alto ) = getimagesize ( $nombreImagen );
		
		// Comprueba que medida es menor para ponerle luego bordes.
		if ($ancho > $alto) {
			$anchoImagen = $nuevoAncho;
			$factorReduccion = $ancho / $nuevoAncho;
			$altoImagen = $alto / $factorReduccion;
		} else {
			$altoImagen = $nuevoAlto;
			$factorReduccion = $alto / $nuevoAlto;
			$anchoImagen = $ancho / $factorReduccion;
		}
		
		// Abre la imagen original.
		list ( $imagen, $tipo ) = $this -> abrirImagen ( $nombreImagen );
		
		// Crea la nueva imagen (el thumbnail).
		$thumbnail = imagecreatetruecolor ( $nuevoAncho, $nuevoAlto );
		imagecopyresampled ( $thumbnail, $imagen, ($nuevoAncho - $anchoImagen) / 2, ($nuevoAlto - $altoImagen) / 2, 0, 0, $anchoImagen, $altoImagen, $ancho, $alto );
		
		// Guarda la imagen.
		$this -> guardarImagen ( $thumbnail, $nombreThumbnail, $tipo );
	}
	function abrirImagen($nombre) {
		$info = getimagesize ( $nombre );
		switch ($info ["mime"]) {
			case "image/jpeg" :
				$imagen = imagecreatefromjpeg ( $nombre );
				break;
			case "image/gif" :
				$imagen = imagecreatefromgif ( $nombre );
				break;
			case "image/png" :
				$imagen = imagecreatefrompng ( $nombre );
				break;
			default :
				echo "Error: No es un tipo de imagen permitido.";
		}
		$resultado [0] = $imagen;
		$resultado [1] = $info ["mime"];
		return $resultado;
	}
	function guardarImagen($imagen, $nombre, $tipo) {
		switch ($tipo) {
			case "image/jpeg" :
				imagejpeg ( $imagen, $nombre, 100 ); // El 100 es la calidade de la imagen (entre 1 y 100. Con 100 sin compresion ni perdida de calidad.).
				break;
			case "image/gif" :
				imagegif ( $imagen, $nombre );
				break;
			case "image/png" :
				imagepng ( $imagen, $nombre, 9 ); // El 9 es grado de compresion de la imagen (entre 0 y 9. Con 9 maxima compresion pero igual calidad.).
				break;
			default :
				echo "Error: Tipo de imagen no permitido.";
		}
	}
}
?>