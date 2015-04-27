<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

/**
 *
 * @subpackage fisico
 * @author Judelvis Rivas
 * @since Version 1.0
 *       
 */
class MPanel extends CI_Model {
	var $identificador = NULL;
	var $nombre = '';
	var $ubicacion = '';
	var $observacion = '';
	function __construct() {
		if (! isset ( $this->db )) {
			$this->load->database ();
		}
	}
	function __destruct() {
		$this->db->close ();
		unset ( $this->db );
	}
	
	/**
	 * funciones para paginas
	 */
	function listaRecientes() {
		$query = 'SELECT * FROM serie
LEFT join (select * from portafolio group by oidser order by modificado desc  )as A on serie.id = A.oidser
  			where estatus=0
order by serie.modificado desc limit 3';
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = '';
		return $lista;
	}

	function sliderP($oid=null) {
		$query = 'select * 
from portafolio
join serie on serie.id = portafolio.oidser
where estatus=0
group by oidser limit 5';
		if($oid != null) $query = 'SELECT * FROM portafolio where oidser='.$oid ;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista= $rec->result ();
		else
			$lista= 0;
		return $lista;
	}
	function buscarTipo($tipo) {
		$query = 'SELECT * FROM serie
  		LEFT join (select * from portafolio group by oidser,oidcat order by modificado desc  )as A on serie.id = A.oidser
  		where estatus=0 and oidcat=' . $tipo;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = ' and oidcat=' . $tipo;
		return $lista;
	}
	function buscarCiudad($id) {
		$query = 'SELECT * FROM inmueble
		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
		where estatus=1 and ciudad=' . $id;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = ' and ciudad=' . $id;
		return $lista;
	}
	function buscarEstado($id) {
		$query = 'SELECT * FROM inmueble
		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
		where estatus=1 and estado=' . $id;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = ' and estado=' . $id;
		return $lista;
	}
	function consulta($arr) {
		$query = 'SELECT * FROM inmueble
		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
		where estatus=1 ';
		$donde = '';
		if (isset($arr ['tipo']) && $arr ['tipo'] != 0)	$donde .= ' and tipo=' . $arr ['tipo'];
		if (isset($arr ['estado']) && $arr ['estado'] != 0)	$donde .= ' and estado=' . $arr ['estado'];
		if (isset($arr ['ciudad']) && $arr ['ciudad'] != 0)	$donde .= ' and ciudad=' . $arr ['ciudad'];
		if (isset($arr ['min_tama']) && $arr ['min_tama'] != 0)	$donde .= ' and tama >= ' . $arr ['min_tama'];
		if (isset($arr ['max_tama']) && $arr ['max_tama'] != 0)	$donde .= ' and tama <= ' . $arr ['max_tama'];
		if (isset($arr ['min_precio']) && $arr ['min_precio'] != 0)	$donde .= ' and precio >= ' . $arr ['min_precio'];
		if (isset($arr ['max_precio']) && $arr ['max_precio'] != 0)	$donde .= ' and precio <= ' . $arr ['max_precio'];
		if (isset($arr ['banos']) && $arr ['banos'] != 0) $donde .= ' and banos = ' . $arr ['banos'];
		if (isset($arr ['habita']) && $arr ['habita'] != 0)	$donde .= ' and habita = ' . $arr ['habita'];
		$rec = $this->db->query ( $query . $donde );
		$lista = array ();
		if ($rec->num_rows () > 0) $lista ['lst'] = $rec->result ();
		else $lista ['lst'] = 0;
		$lista ['query'] = $donde;
		return $lista;
	}
	
	function consulta2($arr){
		$query = 'SELECT * FROM inmueble
		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
		where estatus=1 ';
		$donde = ' and (frase like "%'.$arr['s'].'%" or refe like "%'.$arr['s'].'%")';
		$rec = $this->db->query ( $query . $donde );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = $donde;
		return $lista;
	}
	
	function ordenado($arr) {
		$query = 'SELECT * FROM inmueble
		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
		where estatus=1 ';
		$query .= $arr ['consulta'] . ' order by ' . $arr ['orden'];
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		$lista ['query'] = $arr ['consulta'];
		return $lista;
	}
	
	/**
	 * funciones de galeria
	 */
	function registrarGaleria($arr) {
		$this->db->insert ( "portafolio", $arr );
		return "La imagen se registro correctamente";
	}
	function consultarGaleria($cod) {
		$imagenes = $this->db->query ( 'SELECT * FROM portafolio WHERE oidser=' . $cod );
		$obj = array ();
		$cant = $imagenes->num_rows ();
		if ($cant > 0) {
			$obj ['resp'] = 1;
			$rsImg = $imagenes->result ();
			$i = 0;
			foreach ( $rsImg as $fila ) {
				$i ++;
				$rImg = '<img src="' . __IMG__ . 'galeria/' . $fila->imagen . '" width=200></img> ';
				// $rImg = "epa";
				$cuep [$i] = array ("1" => $fila->oid,"2" => $fila->imagen,"3" => $fila->oidcat,"4" => $fila->oidser,"5" => "","6" => $rImg);
			}
			$obj = array ("Cabezera" => $this->cab (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => "SI");
		} else {
			$obj = array ("msj" => "NO");
		}
		return json_encode ( $obj );
	}
	
	function eliminarGaleria($arr) {
		if ($this->db->query ( "DELETE FROM portafolio WHERE oid=" . $arr [0] )) {
			$archivo = BASEPATH . 'img/galeria/' . $arr [1];
			if (file_exists ( $archivo )) {
				if (unlink ( $archivo ))
					$msj = "El archivo fue borrado";
				else
					$msj = "El archivo no fue borrado";
			} else
				$msj = "El archivo no existe";
		} else {
			$msj = "No se elimino";
		}
		return $msj;
	}
	function cab() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "","oculto" => 1);
		$cabe [2] = array ("titulo" => "Imagen","atributos" => "width:30%;","buscar" => 0);
        $cabe [3] = array ("titulo" => "Categoria");
        $cabe [4] = array ("titulo" => "Serie");
		$cabe [5] = array ("titulo" => "#","tipo" => "bimagen","funcion" => 'eliminarGaleria',"parametro" => "1,2",	"ruta" => __IMG__ . "quitar.png",
				"atributos" => "text-align:center;" );
		$cabe [6
        ] = array ("titulo" => "Ver","atributos" => "width:40%");
		return $cabe;
	}
	
	/*
	 * Funcionas para zona
	 */
	function registrarZona($arr = null) {
		$ban = $this->db->insert ( 'zona', $arr );
		if ($ban) {
			return "Se registro con exito";
		}
		return "No se pudo registrar";
	}
	function cabZona() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "","oculto" => 1);
		$cabe [2] = array ("titulo" => "Estado","atributos" => "width:100px","buscar" => 0);
		$cabe [3] = array ("titulo" => "Descripcion","atributos" => "width:100px","buscar" => 0);
		
		return $cabe;
	}
	function listaZonas() {
		$zona = $this->db->query ( 'SELECT * FROM estado WHERE pais='.__PAIS__ );
		$obj = array ();
		$cant = $zona->num_rows ();
		if ($cant > 0) {
			$rsZon = $zona->result ();
			$i = 0;
			foreach ( $rsZon as $fila ) {
				$i ++;
				$cuep [$i] = array ("1" => $fila->id,"2" => $fila->estado,"3" => $fila->desc);
			}
			$obj = array ("Cabezera" => $this->cabZona (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => 1);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function listaZonas2() {
		$zona = $this->db->query ( 'SELECT * FROM estado WHERE pais='.__PAIS__ );
		$html = '';
		$cant = $zona->num_rows ();
		if ($cant > 0) {
			$rsZon = $zona->result ();
			$i = 0;
			$html = '<div class="grid_3"><div class="box2"><h5>Estados</h5><ul class="list1">';
			foreach ( $rsZon as $fila ) {
				$i ++;
				if ($i > 7) {
					$html .= '</ul></div></div>';
					$html .= '<div class="grid_3"><div class="box2"><h5>Estados</h5><ul class="list1">';
					$i = 1;
				}
				$url = site_url ( "principal/buscarEstado/" . $fila->id );
				$html .= '<li class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.' . $i . 's">
						<a href="' . $url . '">' . $fila->estado . '</a>
					</li>
  					
  					';
			}
			$html .= '</ul></div></div>';
		} else {
			$html = '';
		}
		
		return $html;
	}
	function cmbZonas() {
		$zona = $this->db->query ( 'Select * from estado WHERE pais='.__PAIS__ );
		$rs = $zona->result ();
		$lista = array ();
		
		foreach ( $rs as $fila ) {
			$lista [$fila->id] = $fila->estado;
		}
		// $lista[0]='SELECCIONE ZONA';
		return json_encode ( $lista );
	}
	
	/**
	 * Funciones para ciudad
	 */
	function registrarCiudad($arr = null) {
		$ban = $this->db->insert ( 'ciudad', $arr );
		if ($ban) {
			return "Se registro con exito";
		}
		return "No se pudo registrar";
	}
	function cabCiudad() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "id","oculto" => 0);
		$cabe [2] = array ("titulo" => "Nombre","atributos" => "width:100px","buscar" => 0);
		$cabe [3] = array ("titulo" => "Descripcion","atributos" => "width:100px","buscar" => 0);
		$cabe [4] = array ("titulo" => "Zona","atributos" => "width:100px","buscar" => 0);
		
		return $cabe;
	}
	function listaCiudad() {
		$query = 'SELECT ciudad.id as cid,ciudad.desc as cdesc,estado.estado as znombre,ciudad.ciudad as cnombre,pais 
  			FROM ciudad 
  			join estado on estado.id=ciudad.estado where pais='.__PAIS__;
		$zona = $this->db->query ( $query );
		$obj = array ();
		$cant = $zona->num_rows ();
		if ($cant > 0) {
			$rsZon = $zona->result ();
			$i = 0;
			foreach ( $rsZon as $fila ) {
				$i ++;
				$ciu = 'N/A';
				if ($fila->cdesc != '') {
					$ciu = $fila->cdesc;
				}
				$cuep [$i] = array ("1" => $fila->cid,"2" => $fila->cnombre,"3" => $ciu,"4" => $fila->znombre);
			}
			$obj = array ("Cabezera" => $this->cabCiudad (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => 1);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function cmbCiudad($arr = null) {
		$ciudad = $this->db->query ( 'Select * from ciudad where estado=' . $arr ['zona'] );
		$rs = $ciudad->result ();
		$lista = array ();
		foreach ( $rs as $fila ) {
			$lista [$fila->id] = $fila->ciudad;
		}
		return json_encode ( $lista );
	}
	
	/**
	 * Funciones para Tipo de inmueble
	 */
	function registrarTipo($arr = null) {
		$ban = $this->db->insert ( 'categoria', $arr );
		if ($ban) {
			return "Se Registro con Exito";
		}
		return "No se pudo registrar";
	}
	function cabTipo() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "","oculto" => 1);
		$cabe [2] = array ("titulo" => "Categoria","atributos" => "width:100%","buscar" => 0);
		
		return $cabe;
	}
	function listaTipo2() {
		$html = '';
		$query = 'SELECT * FROM categoria';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			$html .= '<ul>';
			foreach ( $rsTip as $fila ) {
				$url = site_url ( "principal/buscarTipo/" . $fila->oid );
				$html .= '<li><a href="' . $url . '">' . $fila->categoria . '</a></li>';
			}
			$html .= '</ul>';
		} else {
			$html = '';
		}
		return $html;
	}
	function listaTipo() {
		$query = 'SELECT * FROM categoria';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			foreach ( $rsTip as $fila ) {
				$i ++;
				$cuep [$i] = array ("1" => $fila->oid,"2" => $fila->categoria);
			}
			$obj = array ("Cabezera" => $this->cabTipo (),"Cuerpo" => $cuep,"Paginador" => 5,"Origen" => "json","msj" => 1);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function cmbTipo() {
		$zona = $this->db->query ( 'Select * from categoria' );
		$rs = $zona->result ();
		$lista = array ();
		
		foreach ( $rs as $fila ) {
			$lista [$fila->oid] = $fila->categoria;
		}
		// $lista[0]='SELECCIONE ZONA';
		return json_encode ( $lista );
	}
	
	/**
	 * Funciones para Serie
	 */
	function registrarSerie($arr = null) {
		$ban = $this->db->insert ( 'serie', $arr );
		
		if ($ban) {
			return $this->db->insert_id ();
		}
		return "No se pudo registrar";
	}
	function modificarSerie($arr = null, $id) {
		$this->db->where ( 'id', $id );
		$ban = $this->db->update ( 'serie', $arr );
		if ($ban) {
			return "Se modifico con exito";
		}
		return "No se pudo modificar";
	}
	function eliminarSerie($id) {
		$ban = $this->db->query ( 'DELETE FROM serie where id=' . $id );
		if ($ban) {
			$rs = $this->db->query ( "select * from portafolio where oidser=" . $id );
			$rsG = $rs->result ();
			foreach ( $rsG as $fila ) {
				$arr [0] = $fila->oid;
				$arr [1] = $fila->imagen;
				$this->eliminarGaleria ( $arr );
			}
			return "Se elimino con exito";
		}
		return "No se elimino";
	}
	function cabSer() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "Id","oculto" => 1);
		$cabe [2] = array ("titulo" => "Titulo","buscar" => 0);
		$cabe [3] = array ("titulo" => "Descripcion","buscar" => 0 ,"tipo"=>"texto");
		$cabe [4] = array ("titulo" => "Fecha","buscar" => 0,"tipo"=>"calendario");
		$cabe [5] = array ("titulo" => "Estatus","tipo"=>"combo_fijo");
		$cabe [6] = array ("titulo" => "Modificar","tipo" => "bimagen","funcion" => 'modificarSerie',"parametro" => "1,3,4,5","ruta" => __IMG__ . "botones/aceptar1.png",
				"atributos" => "text-align:center;height:50px;padding:20px;","mantiene" => 1);
		$cabe [7] = array ("titulo" => "Eliminar","tipo" => "bimagen","funcion" => 'eliminarSerie',"parametro" => "1","ruta" => __IMG__ . "botones/quitar.png",
				"atributos" => "text-align:center;height:50px;padding:20px;" );
		return $cabe;
	}
	function listaSerie() {
		$cmbEstatus = array ("1" => "Inactivo","0" => "Activo");
		$cmb = array ("5" => $cmbEstatus);
		$query = 'SELECT * FROM serie order by modificado desc ;';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			foreach ( $rsTip as $fila ) {
				$i ++;
				$cuep [$i] = array (
						"1" => $fila->id,
						"2" => $fila->nombre,
						"3" => $fila->descrip.'.',
						"4" => $fila->fecha.'.',
						"5" => $fila->estatus.'.',
						"6" => '',
						"7" => ''
				);
			}
			$obj = array ("Cabezera" => $this->cabSer (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => 1,"Objetos" => $cmb);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function cmbSerie() {
		$zona = $this->db->query ( 'Select * from serie where estatus=0' );
		$rs = $zona->result ();
		$lista = array ();
		
		foreach ( $rs as $fila ) {
			$lista [$fila->id] = $fila->nombre;
		}
		return json_encode ( $lista );
	}
	
	/**
	 * Funciones para servicios
	 */
	function lista_servicios() {
		$ser = $this->db->query ( 'Select * from servicios' );
		$rs = $ser->result ();
		$html = '';
		
		foreach ( $rs as $fila ) {
			$html .= '<option value="' . $fila->id . '">' . $fila->servicio . '</option>';
		}
		return $html;
	}
}
?>