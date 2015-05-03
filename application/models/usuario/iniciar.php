<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/**
 *
 * @subpackage fisico
 * @author Judelvis Rivas
 * @since Version 1.0
 *
 */

//session_start();

class Iniciar extends CI_Model {

  var $token = null;

  function __construct() {
    $this -> load -> model('usuario/usuario', 'Usuario');
  }

  function validarCuenta($arg = null) {
  	
    $this -> Usuario -> sobreNombre = $arg['txtUsuario'];
    $this -> Usuario -> clave = $arg['txtClave'];
    if ($this -> Usuario -> validar() == TRUE) {  
      $this -> _entrar($this -> Usuario);
    } else {
      $this -> _salir();
    }
  }

  private function _entrar($usuario) {
    $_SESSION['usuario_inmo'] = $usuario -> sobreNombre;
    $_SESSION['oid_inmo'] = $usuario -> identificador;
    $_SESSION['nombre_inmo'] = $usuario -> nombre;
    //print_R($_SESSION);
    redirect(base_url() . 'index.php/panel/principal');
    
  }

  private function _salir() {
    session_destroy();
    redirect(base_url());
  }

  function __destruct() {
    unset($this -> Usuario);
  }

}
