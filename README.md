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

- **Cupón de cantidad mínima**. Se aplica un porcentaje de descuento sobre el subtotal cuando se ha agregado al carro de compras la cantidad mínima requerida.

- **Cupón de porcentaje**. Se aplica un porcentaje de descuento sobre el subtotal.

- **Cupón de valor fijo**. Se aplica un descuento directamente sobre el subtotal. No aplica cuando el subtotal es menor al descuento.

#### Editores

Por su parte, los editores son los usuarios encargados de administrar la página, hasta cierto punto. Son los usuarios que agregan, eliminan y modifican las cervezas, cervecerías y eventos; y crean reportes de ventas basados en la fecha que ellos especifiquen y la periodicidad seleccionada. Estos reportes pueden ser exportados en formato PDF.

En el sistema solamente dos editores actúan como administradores de toda la plataforma, y la función que los distingue de los editores comunes es que pueden agregar, modificar y eliminar editores, además de todas las funciones que un editor común realiza.

#### Otros modelos

Tanto clientes como editores son dos de los modelos (*clientes y editors*) usados en este sistema, los otros modelos se enlistan a continuación:

- **Cerveza**. Producto que se opera en todo el sistema.
- **Cerveceria**. Es el proveedor de varias cervezas.
- **Coupon**. Modelo que asocia los tipos de cupones descritos previamente.
- **CantidadMinimaCoupon**. Modelo del cupón de cantidad mínima.
- **PorcentajeCoupon**. Modelo del cupón de porcentaje.
- **ValorFijoCoupon**. Modelo del cupón de valor fijo.
- **Domicilio**. Modelo correspondiente al domicilio del cliente.
- **Tarjeta**. Modelo respectivo de la tarjeta de crédito/débito del cliente.
- **Evento**. Modelo de los eventos creados.
- **Pedido**. Modelo de los pedidos hechos por el cliente.
- **Reporte**. Modelo de los reportes creados por el editor.

## Integrantes

Álvaro Ramírez

Ricardo Rodríguez

## Requisitos de instalación

Para probar el proyecto exitosamente se necesitan instalar los siguientes componentes:

### Composer

**Instalación**

`composer install`

### Laravel scaffolding

**Instalación**

`composer require laravel/ui`

`npm install`

`npm run dev`

### Laravel shopping cart

**Instalación**

`composer require "darryldecode/cart"`

**Configuración**

1. Abrir el archivo *config/app.php* y agregar la siguiente línea al ServiceProviders array:

`Darryldecode\Cart\CartServiceProvider::class`

2. Abrir el archivo *config/app.php* y agregar a los Aliases:

`'Cart' => Darryldecode\Cart\Facades\CartFacade::class`

3. Configuración opcional si deseas obtener todo el control:

`php artisan vendor:publish --provider="Darryldecode\Cart\CartServiceProvider" --tag="config"`

Para más información haz click [aquí](https://github.com/darryldecode/laravelshoppingcart)

### Laravelcollective

**Instalación**

`composer require laravelcollective/html`

Para más información haz click [aquí](https://laravelcollective.com/docs/6.0/html)

### Laravel-dompdf

**Instalación**

`composer require barryvdh/laravel-dompdf`

Para más información haz click [aquí](https://github.com/barryvdh/laravel-dompdf)

### Laraveles

**Instalación**

`composer require laraveles/spanish`

**Configuración**

Para actualizar las traducciones:

`php artisan vendor:publish --tag=lang`

## Configuraciones adicionales

Debido a que se utilizó la tabla *clientes* en lugar de la de *users* y, aunado a que se agregó una función más al shopping cart instalado, se mostrarán los cambios que se hicieron en los respectivos archivos para copiar y pegar las funciones que a continación se presentan.

En */vendor/laravel/ui/auth-backend/AuthenticatesUsers.php* se hicieron cambios en las funciones siguientes:

```
public function showLoginForm()
{
    return view('layouts_editor.editorLogin');
}
```

```
public function username()
{
    return 'correo';
}
```

```
public function logout(Request $request)
{
    $this->guard()->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    if ($response = $this->loggedOut($request)) {
        return $response;
    }

    return $request->wantsJson()
        ? new Response('', 204)
        //: redirect('/');
        : redirect('/inicio');
}
```

En */vendor/laravel/ui/auth-backend/RedirectsUsers.php* se cambió la siguiente función

```
public function redirectPath()
{
    if (method_exists($this, 'redirectTo')) {
        return $this->redirectTo();
    }

    return property_exists($this, 'redirectTo') ? $this->redirectTo : '/cliente'; //Aqui iba /home
}
```

En */vendor/laravel/ui/auth-backend/RegistersUsers.php* se cambió la siguiente función:

```
public function showLoginForm()
{
    return view('layouts_cliente.clienteAcceso');
}
```

En */vendor/darryldecode/cart/src/Darryldecode/Cart/Cart.php* se agregó la siguiente función:

```
public function search(Closure $search)
{
    $content = $this->getContent();

    return $content->filter($search);
}
```

Por último, se mostrará la configuración de las variables del archivo .env, aplicadas para este proyecto:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:FIaM7xFE6YMofCBzADFVyAr56srgWW59pKiaTUHbw3s=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tienda_cata
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.office365.com
MAIL_PORT=587
MAIL_USERNAME=proyecto-cata-tienda@outlook.com
MAIL_PASSWORD="#$%&Proyectocata"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=proyecto-cata-tienda@outlook.com
MAIL_FROM_NAME=Tienda-Online-Cata
```

Las variables de la base de datos pueden ser modificadas por las que el usuario quiera, en cambio, se sugiere que las variables de correo no se cambien ya que el correo que se muestra fue creado con fines de prueba, y está habilitado para usarse en esta aplicación, el uso de otro correo deberá especficiarse en estas variables, pero puede generar algún error.

La aplicación cuenta con los seeders y factories necesarios para probar la aplicación de manera exitosa.
