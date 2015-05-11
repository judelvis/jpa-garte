<?php

/**
 * fecha 01/11/2014
 *
 * @package inmobiliaria
 * @author Judelvis Rivas
 *
 */
session_start ();
class Principal extends CI_Controller {
	function __construct() {
		parent::__construct ();

	}
    function idioma(){
        $_SESSION['idioma'] = '_i';
        redirect ( base_url () );
    }
	function index() {
		$this->principal ();
	}
	function principal() {
		$this->load->model ( 'panel/mpanel', 'MPanel' );
		$busqueda = $this->MPanel->listaRecientes ();
		$data ['lst'] = $busqueda ['lst'];
		$data ['consulta'] = $busqueda ['query'];
		$data ['tit'] = __TITLE__;
		$data ['tb'] = 'Mas Recientes';
        if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')$data ['tb'] = 'Mas Recientes EN ingles';
		$data ['js'] = 'principal';
        $data['tipo'] = 0;
		$data ['lstTipo'] = $this->MPanel->listaTipo2 ();
		$this->load->view ( 'principal/incluir/head', $data );
		$this->load->view ( 'principal/incluir/cab', $data );
		$this->load->view ( 'principal/principal', $data );
		$this->load->view ( 'principal/incluir/pie', $data );
	}
	function contacto() {
		$this->load->model ( 'panel/mpanel', 'MPanel' );
		$data ['tit'] = 'Contactenos';
		$data ['tb'] = 'Contactenos';
        if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')$data ['tb'] = 'Contac';
		$data ['js'] = 'principal';
		$data ['lstTipo'] = $this->MPanel->listaTipo2 ();
		$this->load->view ( 'principal/incluir/head', $data );
		$this->load->view ( 'principal/incluir/cab', $data );
		$this->load->view ( 'principal/contacto', $data );
		$this->load->view ( 'principal/incluir/pie', $data );
	}
	function buscarTipo($tipo) {
		$this->load->model ( 'panel/mpanel', 'MPanel' );
		$busqueda = $this->MPanel->buscarTipo ( $tipo );
		$data ['lst'] = $busqueda['lst'];
		$data ['consulta'] = $busqueda ['query'];
		$data ['tit'] = 'Categoria';
		$data ['tb'] = $this -> MPanel -> mostrarTipo($tipo);
		$data ['js'] = 'principal';
        $data['tipo'] = $tipo;
		$data ['lstTipo'] = $this->MPanel->listaTipo2 ();
		$this->load->view ( 'principal/incluir/head', $data );
		$this->load->view ( 'principal/incluir/cab', $data );
		$this->load->view ( 'principal/principal', $data );
		$this->load->view ( 'principal/incluir/pie', $data );
	}

	function consulta($arr=null) {
		$this->load->model ( 'panel/mpanel', 'MPanel' );
		if(isset($_POST))$arr=$_POST;
		$busqueda = $this->MPanel->consulta ( $arr );
		$data ['lst'] = $busqueda ['lst'];
		$data ['consulta'] = $busqueda ['query'];
		$data ['tit'] = 'Todas Las Series';
		$data ['tb'] = 'Todas Las Series';
        if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')$data ['tb'] = 'All Series';
		$data ['js'] = 'principal';
        $data['tipo'] = 0;
		$data ['lstTipo'] = $this->MPanel->listaTipo2 ();
		$this->load->view ( 'principal/incluir/head', $data );
		$this->load->view ( 'principal/incluir/cab', $data );
		$this->load->view ( 'principal/principal', $data );
		$this->load->view ( 'principal/incluir/pie', $data );
	}
	

	function validarUsuario() {
		$this->load->model ( 'usuario/iniciar', 'Iniciar' );
		$this->Iniciar->validarCuenta ( $_POST );
	}
    /**
     * Funciones para biografia
     */
    function biografia(){
        $this->load->model ( 'panel/mpanel', 'MPanel' );
        $busqueda = $this->MPanel->listaRecientes ();
        $data ['lst'] = $busqueda ['lst'];
        $data ['consulta'] = $busqueda ['query'];
        $data ['tit'] = __TITLE__;
        $data ['tb'] = 'Mas Recientes';
        if(isset($_SESSION['idioma']) && $_SESSION['idioma']=='_i')$data ['tb'] = 'Mas Recientes EN ingles';
        $data ['js'] = 'principal';
        $data['tipo'] = 0;
        $data ['lstTipo'] = $this->MPanel->listaTipo2 ();
        $this->load->view ( 'principal/incluir/head', $data );
        $this->load->view ( 'principal/incluir/cab', $data );
        $this->load->view ( 'principal/biografia', $data );
        $this->load->view ( 'principal/incluir/pie', $data );
    }
	
	/**
	 * funciones paginas
	 */
	function busca_imagenes($oidp = null,$cat) {
		$this->load->model ( 'utilidades/mimagen', 'MImagen' );
		if (isset ( $_POST ['oidp'] ))
			$oidp = $_POST ['oidp'];
		return $this->MImagen->busca_imagenes ( $oidp,$cat );
		// echo $oidp;
	}

    function mostrarSerie($oidser=null,$oidcat=null){
        $this -> load -> model('panel/mpanel', 'MPanel');
        //print_R($_POST);
        if($oidser == null) {
            $arr = $_POST;
        }else{
            $arr['oidser'] = $oidser;
            $arr['oidcat'] = $oidcat;
        }
        $datos['lst'] = $this -> MPanel -> consultarGaleriaSerie($arr);
        //print("<pre>");
        //print_R($datos);
        $this->load->view ( 'principal/galeria', $datos );
    }

	function galeria2($oid,$cat) {
		$this->load->model ( 'panel/mpanel', 'MPanel' );
		$data ['js'] = 'detalle';
		$data ['lst'] = $this->busca_imagenes ( $oid,$cat );
		$data ['slider'] = $this ->MPanel-> sliderP($oid);
		$data ['tit'] = 'Detalle';
		$data ['tb'] = 'Detalle';
		$data ['js'] = 'principal';
		$data ['jss'] = 'sld';
		$data ['lstTipo'] = $this->MPanel->listaTipo2 ();
		//$data ['lstEstados'] = $this->MPanel->listaZonas2 ();
		$this->load->view ( 'principal/incluir/head', $data );
		$this->load->view ( 'principal/incluir/cab', $data );
		$this->load->view ( 'principal/detalle', $data );
		$this->load->view ( 'principal/incluir/pie', $data );
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