-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-03-2014 a las 22:24:51
-- Versión del servidor: 5.5.32-log
-- Versión de PHP: 5.4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estcorp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre Oficina, Bodega, Sucursal',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Ubicación del deposito' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`oid`, `nomb`, `ubic`, `obse`) VALUES
(1, 'Oficina Principal', 'Mérida', 'Mérida Estado Mérida'),
(2, 'Sucursal Barinas', 'Barinas', 'Barinas'),
(3, 'El Vigia', 'Merida', 'Merida'),
(4, 'Despensa', 'Hechizera Merida', 'Hechizera Merida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `oid` tinyint(1) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Catégoria de Productos' AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`oid`, `nomb`) VALUES
(1, 'Línea Blanca'),
(2, 'Línea Marrón'),
(3, 'Matocicleta'),
(4, 'Celulares'),
(5, 'Equipos de Computación'),
(6, 'Artefactos Electricos'),
(7, 'Electrodomesticos'),
(8, 'Equipo de Sonidos'),
(9, 'Equipos de Video'),
(10, 'Partes Electricas'),
(11, 'Partes Mecanicas'),
(12, 'Autoperiquitos'),
(13, 'Sistemas de Escape'),
(14, 'Carburación'),
(15, 'Lubricantes'),
(16, 'Artículos de Ferreteria'),
(17, 'Cauchos'),
(18, 'Papeleria'),
(19, 'Automóvil '),
(20, 'Comida'),
(21, 'Bolsas Plasticas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existencia`
--

CREATE TABLE IF NOT EXISTS `existencia` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador en Almacen',
  `marc` varchar(16) NOT NULL COMMENT 'Marca',
  `prov` varchar(16) NOT NULL COMMENT 'Proveedores',
  `mode` varchar(255) NOT NULL COMMENT 'Modelo',
  `dscr` varchar(255) NOT NULL COMMENT 'Descripcion',
  `oidp` int(11) NOT NULL COMMENT 'Identificador del Producto',
  `seri` varchar(64) NOT NULL COMMENT 'Serial del Producto',
  `lote` varchar(16) NOT NULL COMMENT 'Lote del Producto',
  `cuni` decimal(10,2) NOT NULL COMMENT 'Costo por unidad',
  `cpro` decimal(10,2) NOT NULL COMMENT 'Costo de Produccion',
  `cdet` decimal(10,2) NOT NULL COMMENT 'Costo al Detal',
  `cmay` decimal(10,2) NOT NULL COMMENT 'Costo al Mayor',
  `unid` int(2) NOT NULL COMMENT 'Unidad de Medida Para la venta',
  `cant` int(11) NOT NULL COMMENT 'Cantidad de Elementos',
  `fact` varchar(32) NOT NULL COMMENT 'Factura',
  `esta` tinyint(1) NOT NULL COMMENT '0: Disponible 1: Comprometido 2: Vendido',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación en Almacen',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de Modificacion',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `seri` (`seri`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Mercancía activa e inactiva' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `existencia`
--

INSERT INTO `existencia` (`oid`, `marc`, `prov`, `mode`, `dscr`, `oidp`, `seri`, `lote`, `cuni`, `cpro`, `cdet`, `cmay`, `unid`, `cant`, `fact`, `esta`, `ubic`, `fech`) VALUES
(1, 'Bera', 'Ricambi', 'Jaguar BR 150-200', 'Jaguar BR 150-200 (PAR)', 1, '61121-SCG-000', '61121-SCG-000', 0.00, 45.94, 59.73, 61.51, 2, 2, '00-0000159', 1, '1', '2014-03-05 22:21:17'),
(2, 'Bera', 'Ricambi', 'Jaguar BR 200', 'Jaguar BR 200 (PAQ X 2 UNID)', 2, '14700-SJC-000', '14700-SJC-000', 0.00, 107.16, 139.30, 143.48, 2, 2, '00-0000159', 0, '1', '2014-03-05 16:07:50'),
(3, 'Bera', 'Ricambi', 'Jaguar 125', 'Jaguar 125 (PAR)', 1, '6121-SCG-001', '6121-SCG-001', 0.00, 52.00, 53.00, 58.00, 2, 2, '00-0000159', 0, '1', '2014-03-05 22:17:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador Inventario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Producto',
  `disp` int(11) NOT NULL COMMENT 'Cantidad Existente',
  `prec` decimal(10,2) NOT NULL COMMENT 'Precio Unitario',
  `fent` date NOT NULL COMMENT 'Fecha Entrada',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `oidp_3` (`oidp`),
  KEY `oidp` (`oidp`),
  KEY `oidp_2` (`oidp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Registro, balance, descripción, lista, relación' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`oid`, `oidp`, `disp`, `prec`, `fent`) VALUES
(1, 1, 3, 52.00, '2014-03-05'),
(2, 2, 2, 107.16, '2014-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `oid` varchar(16) NOT NULL COMMENT 'Indentificador Lote',
  `obsr` varchar(64) NOT NULL COMMENT 'Observaciones Generales',
  `cant` int(11) NOT NULL COMMENT 'Cantidad Disponible',
  `fent` date NOT NULL COMMENT 'Fecha de Entradas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Parte, ración, cuota, porción';

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`oid`, `obsr`, `cant`, `fent`) VALUES
('6121-SCG-001', '6121-SCG-001', 2, '0000-00-00'),
('14700-SJC-000', 'Balancin Jaguar BR 200 (PAQ X 2 UNID)', 2, '0000-00-00'),
('61121-SCG-000', 'Par de Abrazaderas', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Signo distintivo de un producto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE IF NOT EXISTS `movimiento` (
  `oidi` int(11) NOT NULL COMMENT 'Identificador Inventario',
  `cant` int(11) NOT NULL COMMENT 'Cantidad',
  `prec` decimal(10,0) NOT NULL COMMENT 'Precio Unitario',
  `fsal` date NOT NULL COMMENT 'Fecha Salida'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Desplazamiento, circulación';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE IF NOT EXISTS `orden` (
  `codi` varchar(16) NOT NULL COMMENT 'Código Unico',
  `nomb` varchar(256) NOT NULL COMMENT 'Nombre del Pedido',
  `tipo` int(2) NOT NULL COMMENT '0: Pedido, 1: Despacho, 2: Facturación',
  `fech` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha del Evento',
  PRIMARY KEY (`codi`,`tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Control de Pedidos';

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`codi`, `nomb`, `tipo`, `fech`) VALUES
('0', 'Carrito: Solicitud de Pedido', 0, '2014-03-05 22:15:07'),
('0', 'Compra', 2, '2014-03-05 22:21:46'),
('0', 'Despacho', 1, '2014-03-05 22:21:48'),
('1', 'Carrito: Solicitud de Pedido', 0, '2014-03-05 04:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `oidu` int(11) NOT NULL COMMENT 'Identificador del Usuario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Producto',
  `cant` int(11) NOT NULL COMMENT 'Cantidad',
  `prec` decimal(10,2) NOT NULL COMMENT 'Precio',
  `orde` varchar(16) NOT NULL COMMENT 'Orden de Pedido',
  `esta` tinyint(1) NOT NULL COMMENT '0: Comprometido, 1: Vendido ',
  PRIMARY KEY (`oid`),
  KEY `oidu` (`oidu`),
  KEY `oidp` (`oidp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Encargo, petición, demanda' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`oid`, `oidu`, `oidp`, `cant`, `prec`, `orde`, `esta`) VALUES
(8, 2, 1, 1, 45.94, '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `enmb` varchar(64) NOT NULL COMMENT 'MD5 Perfil',
  `obse` varchar(255) NOT NULL COMMENT 'Observaciones',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Perfiles de los clientes' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`oid`, `nomb`, `enmb`, `obse`) VALUES
(1, 'Administrador', '2a2e9a58102784ca18e2605a4e727b5f', 'Control de Acceso Todal'),
(2, 'Normal', '960b44c579bc2f6818d2daaf9e4c16f0', 'Cliente - Comprar Normal'),
(3, 'Revendedores', '9f9278682707efc6b7345fa39df105dc', 'Cliente - Compra Revender');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `codi` varchar(16) NOT NULL COMMENT 'Código Producto',
  `nomb` varchar(128) NOT NULL COMMENT 'Nombre del Producto',
  `obse` varchar(255) NOT NULL COMMENT 'Observacion',
  `unid` int(2) NOT NULL COMMENT 'Tipo',
  `cpro` decimal(10,2) NOT NULL COMMENT 'Costo de Producción',
  `cate` tinyint(1) NOT NULL COMMENT 'Categoria',
  `meto` tinyint(1) NOT NULL COMMENT 'Metodo 0: PEPS, 1: UEPS',
  `maxi` int(11) NOT NULL COMMENT 'Máximo',
  `mini` int(11) NOT NULL COMMENT 'Mínimo',
  `imag` varchar(256) NOT NULL COMMENT 'Ruta de la Imagen',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `nomb` (`nomb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Artículo, manufactura, elaboración' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`oid`, `codi`, `nomb`, `obse`, `unid`, `cpro`, `cate`, `meto`, `maxi`, `mini`, `imag`) VALUES
(1, 'ADV-001', 'Abrazadera de Volante', 'Abrazadera de Volante', 7, 45.94, 11, 0, 10, 1, 'abrazaderamotosjaguar.jpg'),
(2, 'BAL-001', 'Balancin', 'Balancin de Moto', 8, 107.16, 11, 0, 100, 1, 'balancin-oscilante.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `rif` varchar(16) NOT NULL COMMENT 'Registro de Información Fiscal',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre',
  `ubic` varchar(255) NOT NULL COMMENT 'Ubicación',
  `esta` tinyint(1) NOT NULL COMMENT 'Estatus',
  `fech` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha Entrega',
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Presta servicios a otras entidades' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `oid` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `nomb` varchar(64) NOT NULL COMMENT 'Nombre Descriptivo',
  PRIMARY KEY (`oid`),
  KEY `nomb` (`nomb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Unidad de Medida' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`oid`, `nomb`) VALUES
(1, 'Unidad'),
(2, 'Caja'),
(3, 'Gas'),
(4, 'Liquido'),
(5, 'Lote'),
(6, 'Kit / Set'),
(7, 'Par'),
(8, 'Paquete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `oid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `tipo` char(1) NOT NULL COMMENT 'tipo V: Venezolano, J: Juridico',
  `cedu` int(11) NOT NULL COMMENT 'Cedula o rif',
  `nomb` varchar(255) NOT NULL COMMENT 'Nombre del Cliente',
  `apel` varchar(255) NOT NULL COMMENT 'Apellido',
  `dire` varchar(255) NOT NULL COMMENT 'Direccion de Habitacion',
  `seud` varchar(255) NOT NULL COMMENT 'Seudo Nombre',
  `clav` varchar(255) NOT NULL COMMENT 'Clave MD5',
  `corr` varchar(255) NOT NULL COMMENT 'Correo',
  `celu` varchar(16) NOT NULL COMMENT 'Celular',
  `telf` varchar(16) NOT NULL COMMENT 'Teléfono',
  `empr` varchar(255) NOT NULL COMMENT 'Empresa',
  `pagi` varchar(255) NOT NULL COMMENT 'Pagina Web',
  PRIMARY KEY (`oid`),
  UNIQUE KEY `cedu` (`cedu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Control de usuarios' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`oid`, `tipo`, `cedu`, `nomb`, `apel`, `dire`, `seud`, `clav`, `corr`, `celu`, `telf`, `empr`, `pagi`) VALUES
(1, 'V', 17522251, 'Carlos', 'Peña', 'El Moral Parte Baja la lagunita', 'Admin', '202cb962ac59075b964b07152d234b70', 'crash_madover@gmail.com', '0416-3555666', '', 'GenProg C.A', 'www.genprog.org'),
(2, 'V', 17522252, 'Carlos', 'Peña', 'El Moral la lagunita', 'Crash', '202cb962ac59075b964b07152d234b70', 'crash.madover@gmail.com', '0416-3555666', '0274-4163946', 'GenProg C.A', 'http://www.genprog.com.ve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `_usuarioperfil`
--

CREATE TABLE IF NOT EXISTS `_usuarioperfil` (
  `oidu` int(11) NOT NULL COMMENT 'Identificador Usuario',
  `oidp` int(11) NOT NULL COMMENT 'Identificador Perfil',
  UNIQUE KEY `oidu` (`oidu`,`oidp`),
  KEY `oidu_2` (`oidu`),
  KEY `oidp` (`oidp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Relacion Usuario - Perfil';

--
-- Volcado de datos para la tabla `_usuarioperfil`
--

INSERT INTO `_usuarioperfil` (`oidu`, `oidp`) VALUES
(1, 1),
(2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
