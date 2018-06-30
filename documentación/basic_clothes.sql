--
-- Base de datos: `basic-clothes`
--

-- CREAR BASE DE DATOS SI NO EXISTE
CREATE DATABASE IF NOT EXISTS basic_clothes;
-- DICERLE A LA COMPUTADORA CON QUE BD VAMOS A INTERACTUAR
USE basic_clothes;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave_producto` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `fecha` date NOT NULL,
  `estatus_envio` varchar(50) NOT NULL,
  `estatus_compra` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo_user` varchar(100) NOT NULL,
  `clave_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `clave_producto` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `clave_producto` varchar(100) NOT NULL,
  `clave_user` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;
 
-- ALTER TABLE compras MODIFY direccion text NOT NULL;

-- describe inventario;
-- describe imagenes;
-- describe usuarios;
-- describe deseos;
-- describe rating;
-- describe compras;
-- select * from usuarios;
-- select * from inventario;
-- select * from imagenes;
-- select * from usuarios;
-- select * from deseos;
-- select * from pais;
-- select *from estado where pais_id=42;
-- select * from compras;
-- select * from rating;
-- update inventario set categoria="CALZADO" where id=2;
-- delete from deseos where id=3;
-- SELECT * FROM deseos WHERE correo_user ='vicenteoli93@gmail.com'  ORDER BY id DESC 
