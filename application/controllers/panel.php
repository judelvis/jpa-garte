<?php

/**
 * fecha 01/11/2014
 *
 * @package inmobiliaria
 * @author Judelvis Rivas
 *
 */
session_start ();
class Panel extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	function index() {
		$this->load->view('entrar');
	}
	
	function validarUsuario(){
		$this->load->model('usuario/iniciar', 'Iniciar');
		$this->Iniciar->validarCuenta($_POST);
	}
	

	/**
	 * Funciones modulo zona
	 */
	
	function zona(){
		if (!isset($_SESSION['usuario_inmo'])) {
			session_destroy();
			redirect(base_url() . 'index.php/principal');
		}
		$data['js'] = 'zona';
		$data['formulario'] = 'zona';
		$this->load->view('plantilla/cabezera',$data);
		$this->load->view('panel/incluir/menu');
		$this->load->view('inicio_panel',$data);
	}
	
	function registrarZona(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> registrarZona($_POST);
	
	}
	
	function cmbZonas(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> cmbZonas();
		//echo "pasa";
	}
	
	function listarZonas(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> listaZonas();
	}
	
	/**
	 * Funciones para modulo ciudad
	 */
	
	function ciudad(){
		if (!isset($_SESSION['usuario_inmo'])) {
			session_destroy();
			redirect(base_url() . 'index.php/principal');
		}
		$data['js'] = 'ciudad';
		$data['titulo'] = 'Ciudades';
		$data['formulario'] = 'ciudad';
		$this->load->view('panel/incluir/cabecera',$data);
		$this->load->view('panel/incluir/menu');
		$this->load->view('panel/principal',$data);
	}
	
	function registrarCiudad(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> registrarCiudad($_POST);
	
	}
	
	function listarCiudad(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> listaCiudad();
	}
	
	function cmbCiudad(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> cmbCiudad($_POST);
		//print_r($_POST);
	}
	
	/**
	 * Funciones para modulo tipo
	 */
	
	function tipo(){
		if (!isset($_SESSION['usuario_inmo'])) {
			session_destroy();
			redirect(base_url() . 'index.php/principal');
		}
		$data['js'] = 'tipo';
		$data['formulario'] = 'tipo';
		$data['titulo']='Tipo De Inmueble';
		$this->load->view('panel/incluir/cabecera',$data);
		$this->load->view('panel/incluir/menu');
		$this->load->view('panel/principal',$data);
	}
	
	function registrarTipo(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> registrarTipo($_POST);
	
	}
	
	function listarTipo(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> listaTipo();
	}
	
	function cmbTipo(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> cmbTipo();
		//echo "pasa";
	}
	
	/**
	 * Funciones para modulo inmueble
	 */
	
	function principal(){
		if (!isset($_SESSION['usuario_inmo'])) {
			session_destroy();
			redirect(base_url() . 'index.php/principal');
		}
		$this -> load -> model('panel/mpanel', 'MPanel');
		$data['js'] = 'inmueble';
		$data['titulo'] = 'Inmueble';
		$data['formulario'] = 'inmueble';
		$data['servicios'] = $this -> MPanel -> lista_servicios();
		$this->load->view('panel/incluir/cabecera',$data);
		$this->load->view('panel/incluir/menu');
		$this->load->view('panel/principal',$data);
	}
	
	function registrarInmueble(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		$ref = $this -> generaRef();
		//print_r($_POST);
		echo $this -> MPanel -> registrarInmueble($_POST,$ref);
	
	}
	
	function listarInmueble(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> listaInmueble();
	}
	
	function cmbInmuebles(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> cmbInmueble();
		//echo "pasa";
	}
	
	function generaRef(){
		$this -> load -> model('panel/mpanel', 'MPanel');
		$sCod = rand(1, 99999);
		return $this -> MPanel -> _setCodigoSRand($sCod);
	}
	
	function modificarInmueble(){
		$ele = json_decode($_POST['objeto'],true);
		//print_R($_POST);
		$datos=array("frase"=>$ele[1],"detalle"=>$ele[2],"direc"=>$ele[3],"tama"=>$ele[4],
				"precio"=>$ele[5],"habita"=>$ele[6],"banos"=>$ele[7],"estaciona"=>$ele[8],"servicios"=>$ele[9],"ubica"=>$ele[10]);
		if($ele[11] == '0' || $ele[11] == '1'){
			$datos['estatus']=$ele[11];
		}
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> modificarInmueble($datos,$ele[0]);
	}
	
	function eliminarInmueble(){
		$ele = json_decode($_POST['objeto'],true);
		$this -> load -> model('panel/mpanel', 'MPanel');
		echo $this -> MPanel -> eliminarInmueble($ele[0]);
	}
	
	
	/**
	 * Funcion para generar excel desde tgrid
	 */
	public function Exporta_Exel() {
		//print_R($_POST);
		$this -> load -> model('utilidades/mexcel','MExcel');
		$this -> MExcel -> cabezera = json_decode($_POST['cabezera'] ,TRUE);
		$this -> MExcel -> cuerpo = json_decode($_POST['cuerpo'],TRUE);
		$nomb = 'reporte_'.Date('U').'.xls';
		$ruta = BASEPATH.'repository/xls/'.$nomb;
		$this -> MExcel -> Generar();
		$this -> MExcel -> Guardar($ruta);
		echo "<br><center><a href='" . __LOCALWWW__ . "/system/repository/xls/".$nomb."' target='top'><img src='" . __IMG__ . "exel1.jpg' style='width:70px'>Click aqui</img></a>";
	}
	
	/**
	 * funciones de galeria
	 */
	function agregarGaleria($id='') {
		if (!isset($_SESSION['usuario_inmo'])) {
			session_destroy();
			redirect(base_url() . 'index.php/principal');
		}
		$data['js'] = 'panel';
		$data['formulario'] = 'creaGaleria';
		if(isset($id) && $id !=''){
			$data['id']=$id;
		}
		$data['titulo'] = 'Crear galeria de inmueble';
		
		$this->load->view('panel/incluir/cabecera',$data);
		$this->load->view('panel/incluir/menu');
		$this->load->view('panel/principal',$data);
	}
	
	function registrarGaleria() {
		$this -> load -> model('utilidades/mimagen', 'MImagen');
		$this -> load -> model('panel/mpanel', 'MPanel');
		$oidp = $_POST['codigo'];
	
		$valor = $this -> MImagen -> cargar($_FILES, BASEPATH . 'img/galeria') -> salvar();
		$nombreImagen = $_FILES['imagen']['name'];
		if($valor)echo $this -> MPanel -> registrarGaleria($oidp, $nombreImagen);
		else echo "No se pudo guardar la imagen".$valor['mensaje'];
		//echo "si";
	
	}
	
	function consultarGaleria() {
		$this -> load -> model('panel/mpanel', 'MPanel');
		$oidp = $_POST['codigo'];
		echo $this -> MPanel -> consultarGaleria($oidp);
		//echo "si";
	}
	
	function eliminarGaleria() {
		$this -> load -> model('panel/mpanel', 'MPanel');
		$json = json_decode($_POST['objeto'], true);
		echo $this -> MPanel -> eliminarGaleria($json);
	}
	
	/**
	 * funcion para enviar correo
	 */
	function Envia_Correo(){
		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$cabeceras .= 'FROM:jp-inmobiliaria.com' . "\r\n";
		$cuerpo = "<h3>Nombre:</h3><br>".$_POST['nombre']."<br><h3>Correo Cliente:</h3><br>".$_POST['correo'].
		"<br><br><h3>Mensaje:</h3><br>".$_POST['mensaje']."<br><br><h3>Telefono:</h3><br>".$_POST['tel'];
	
		if(mail("jeancarlosrivas@gmail.com,jud.prog@gmail.com", "EMPRESA:INFORMACION", $cuerpo, $cabeceras))
			echo "SE ENVIO CORREO";
		else echo "ERROR";
	}
	
	/**
	 * Cerrar Sesion del sistema
	 */
	function cerrar() {
		session_destroy ();
		redirect ( base_url () );
	}
	function __destruct() {
	}
}