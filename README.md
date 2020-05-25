<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Nombre del proyecto

Tienda Online Cata

## Descripción del proyecto

El proyecto consiste en una tienda en línea de cervezas artesanales pensada tanto para clientes como para los administradores del negocio.

El sistema cuenta con dos tipos de usuario:

- Clientes
- Editores

#### Clientes

Los clientes son aquellos usuarios que van a interactuar con la interfaz destinada para ellos, por medio de la creación de una cuenta, la "compra" de productos", revisión de sus pedidos, búsqueda de los productos, entre otras funciones más. Los clientes pueden agregar información de su domicilio y tarjeta de crédito/débito, información necesaria para realizar los pedidos.

Cuando un cliente hace un pedido, se envía un correo electrónico que confirma que el pedido ha sido realizado, además de que pueden verificaro en la opción de Mis Pedidos, que se puede acceder al hacer click en Mi Cuenta, ubicada en la parte superior de la interfaz.

Los clientes pueden usar cupones para obtener descuentos en sus pedidos, los tipos de cupones que hay son los siguientes:

- Cupón de cantidad mínima. Se aplica un porcentaje de descuento sobre el subtotal cuando se ha agregado al carro de compras la cantidad mínima requeridad.

- Cupón de porcentaje. Se aplica un porcentaje de descuento sobre el subtotal.

- Cupón de valor fijo. Se aplica un descuento directamente sobre el subtotal. No aplica cuando el subtotal es menor al descuento.

#### Editores

Por su parte, los editores son los usuarios encargados de administrar la página, hasta cierto punto. Son los usuarios que agregan, eliminan y modifican las cervezas, cervecerías y eventos; y crean reportes de ventas basados en la fecha que ellos especifiquen y la periodicidad seleccionada. Estos reportes pueden ser exportados en formato PDF.


