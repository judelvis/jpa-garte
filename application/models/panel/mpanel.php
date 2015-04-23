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
		$query = 'SELECT * FROM inmueble 
LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
  			where estatus=1
order by inmueble.creado desc limit 3';
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
from galeria 
join inmueble on inmueble.id = galeria.oidi
where estatus=1
group by oidi limit 5';
		if($oid != null) $query = 'SELECT * FROM galeria where oidi='.$oid ;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista= $rec->result ();
		else
			$lista= 0;
		return $lista;
	}
	function buscarTipo($tipo) {
		$query = 'SELECT * FROM inmueble
  		LEFT join (select * from galeria group by oidi order by creado desc  )as A on inmueble.id = A.oidi
  		where estatus=1 and tipo=' . $tipo;
		$rec = $this->db->query ( $query );
		$lista = array ();
		if ($rec->num_rows () > 0)
			$lista ['lst'] = $rec->result ();
		else
			$lista ['lst'] = 0;
		$lista ['query'] = ' and tipo=' . $tipo;
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
	function registrarGaleria($cod, $nom) {
		$data = array ("oidi" => $cod,"imagen" => $nom);
		$this->db->insert ( "galeria", $data );
		return "La imagen se registro correctamente";
	}
	function consultarGaleria($cod) {
		$imagenes = $this->db->query ( 'SELECT * FROM galeria WHERE oidi=' . $cod );
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
				$cuep [$i] = array ("1" => $fila->oid,"2" => $fila->imagen,"3" => "","4" => $rImg);
			}
			$obj = array ("Cabezera" => $this->cab (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => "SI");
		} else {
			$obj = array ("msj" => "NO");
		}
		return json_encode ( $obj );
	}
	
	function eliminarGaleria($arr) {
		if ($this->db->query ( "DELETE FROM galeria WHERE oid=" . $arr [0] )) {
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
		$cabe [3] = array ("titulo" => "#","tipo" => "bimagen","funcion" => 'eliminarGaleria',"parametro" => "1,2",	"ruta" => __IMG__ . "quitar.png",
				"atributos" => "text-align:center;" );
		$cabe [4] = array ("titulo" => "Ver","atributos" => "width:40%");
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
		$ban = $this->db->insert ( 'tipo', $arr );
		if ($ban) {
			return "Se Registro con Exito";
		}
		return "No se pudo registrar";
	}
	function cabTipo() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "","oculto" => 1);
		$cabe [2] = array ("titulo" => "Tipo","atributos" => "width:100%","buscar" => 0);
		
		return $cabe;
	}
	function listaTipo2() {
		$html = '';
		$query = 'SELECT * FROM tipo';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			$html .= '<ul>';
			foreach ( $rsTip as $fila ) {
				$url = site_url ( "principal/buscarTipo/" . $fila->id );
				$html .= '<li><a href="' . $url . '">' . $fila->tipo . '</a></li>';
			}
			$html .= '</ul>';
		} else {
			$html = '';
		}
		return $html;
	}
	function listaTipo() {
		$query = 'SELECT * FROM tipo';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			foreach ( $rsTip as $fila ) {
				$i ++;
				$cuep [$i] = array ("1" => $fila->id,"2" => $fila->tipo);
			}
			$obj = array ("Cabezera" => $this->cabTipo (),"Cuerpo" => $cuep,"Paginador" => 5,"Origen" => "json","msj" => 1);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function cmbTipo() {
		$zona = $this->db->query ( 'Select * from tipo' );
		$rs = $zona->result ();
		$lista = array ();
		
		foreach ( $rs as $fila ) {
			$lista [$fila->id] = $fila->tipo;
		}
		// $lista[0]='SELECCIONE ZONA';
		return json_encode ( $lista );
	}
	
	/**
	 * Funciones para Inmueble
	 */
	function registrarInmueble($arr = null, $ref) {
		$cod = $this->completar ( $ref, 8 );
		$refe = 're-' . $cod;
		$arr ['refe'] = $refe;
		$ban = $this->db->insert ( 'inmueble', $arr );
		
		if ($ban) {
			return $this->db->insert_id ();
		}
		return "No se pudo registrar";
	}
	function modificarInmueble($arr = null, $id) {
		$this->db->where ( 'id', $id );
		$ban = $this->db->update ( 'inmueble', $arr );
		if ($ban) {
			return "Se modifico con exito";
		}
		return "No se pudo modificar";
	}
	function eliminarInmueble($id) {
		$ban = $this->db->query ( 'DELETE FROM inmueble where id=' . $id );
		if ($ban) {
			$rs = $this->db->query ( "select * from galeria where oidi=" . $id );
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
	function cabInmu() {
		$cabe = array ();
		$cabe [1] = array ("titulo" => "Id","oculto" => 1);
		$cabe [2] = array ("titulo" => "Referencia","buscar" => 0);
		$cabe [3] = array ("titulo" => "Frase","buscar" => 0,'tipo' => 'textArea');
		$cabe [4] = array ("titulo" => "Detalle","buscar" => 0,'tipo' => 'textArea');
		$cabe [5] = array ("titulo" => "Estado","buscar" => 0);
		$cabe [6] = array ("titulo" => "Ciudad","buscar" => 0);
		$cabe [7] = array ("titulo" => "Direccion","buscar" => 0,'tipo' => 'textArea');
		$cabe [8] = array ("titulo" => "Tipo");
		$cabe [9] = array ("titulo" => "Tamaño","tipo"=>"texto");
		$cabe [10] = array ("titulo" => "Precio","tipo"=>"texto");
		$cabe [11] = array ("titulo" => "Habitaciones","tipo"=>"texto");
		$cabe [12] = array ("titulo" => "Baños","tipo"=>"texto");
		$cabe [13] = array ("titulo" => "Estacionamiento","tipo"=>"texto");
		$cabe [14] = array ("titulo" => "Servicios","tipo"=>"texto");
		$cabe [15] = array ("titulo" => "GoogleMaps","tipo"=>"texto_fijo");
		$cabe [16] = array ("titulo" => "Estatus","tipo"=>"combo_fijo");
		$cabe [17] = array ("titulo" => "Modificar","tipo" => "bimagen","funcion" => 'modificarInmueble',"parametro" => "1,3,4,7,9,10,11,12,13,14,15,16","ruta" => __IMG__ . "botones/aceptar1.png",
				"atributos" => "text-align:center;height:50px;padding:20px;","mantiene" => 1);
		$cabe [18] = array ("titulo" => "Eliminar","tipo" => "bimagen","funcion" => 'eliminarInmueble',"parametro" => "1","ruta" => __IMG__ . "botones/quitar.png",
				"atributos" => "text-align:center;height:50px;padding:20px;" );
		return $cabe;
	}
	function listaInmueble() {
		$cmbEstatus = array ("0" => "Inactivo","1" => "Activo");
		$cmb = array ("16" => $cmbEstatus);
		$query = 'SELECT inmueble.id as iid,refe,precio,tama,detalle,if(estatus=1,"Activo","Inactivo")as est,estatus,
				tipo.tipo as tnom,estado.estado as znom,ciudad.ciudad as cnom,frase,habita,banos,estaciona,servicios,ubica,direc
				FROM inmueble
				join tipo on tipo.id = inmueble.tipo
				join estado on estado.id = inmueble.estado
				join ciudad on ciudad.id = inmueble.ciudad
				order by inmueble.id desc ;';
		$tipo = $this->db->query ( $query );
		$obj = array ();
		$cant = $tipo->num_rows ();
		if ($cant > 0) {
			$rsTip = $tipo->result ();
			$i = 0;
			foreach ( $rsTip as $fila ) {
				$i ++;
				$cuep [$i] = array (
						"1" => $fila->iid,
						"2" => $fila->refe,
						"3" => $fila->frase.'.',
						"4" => $fila->detalle.'.',
						"5" => $fila->znom.'.',
						"6" => $fila->cnom.'.',
						"7" => $fila->direc.'.',
						"8" => $fila->tnom.'.',
						"9" => $fila->tama.'.',
						"10" => $fila->precio.'.',
						"11" => $fila->habita.'.',
						"12" => $fila->banos.'.',
						"13" => $fila->estaciona.'.',
						"14" => $fila->servicios.'.',
						"15" => $fila->ubica.'.',
						"16" => $fila->estatus,
						"17" => '',
						"18" => '' 
				);
			}
			$obj = array ("Cabezera" => $this->cabInmu (),"Cuerpo" => $cuep,"Paginador" => 10,"Origen" => "json","msj" => 1,"Objetos" => $cmb);
		} else {
			$obj = array ("msj" => 0);
		}
		
		return json_encode ( $obj );
	}
	function cmbInmueble() {
		$zona = $this->db->query ( 'Select * from inmueble where estatus=1' );
		$rs = $zona->result ();
		$lista = array ();
		
		foreach ( $rs as $fila ) {
			$lista [$fila->id] = $fila->refe . ' | ' . $fila->frase;
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
	
	/**
	 * Utilidades
	 */
	function _setCodigoSRand($sCod) {
		$sConsulta = "SELECT cod FROM t_srand WHERE cod='" . $sCod . "' LIMIT 1";
		$rsC = $this->db->query ( $sConsulta );
		if ($rsC->num_rows () != 0) {
			$aux = rand ( 1, 99999 );
			$C = $this->_setCodigoSRand ( $aux );
			return $C;
		} else {
			$this->db->query ( 'INSERT INTO t_srand (oid, cod) VALUES (NULL, \'' . $sCod . '\');' );
			return $sCod;
		}
	}
	public function Completar($strCadena = '', $intLongitud = '') {
		$strContenido = '';
		$strAux = '';
		$intLen = strlen ( $strCadena );
		if ($intLen != $intLongitud) {
			$intCount = $intLongitud - $intLen;
			for($i = 0; $i < $intCount; $i ++) {
				$strAux .= '0';
			}
			$strContenido = $strAux . $strCadena;
		}
		return $strContenido;
	}
}
?>