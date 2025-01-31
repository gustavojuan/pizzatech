@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>{{ __('¡Bienvenido al Sistema de Gestión de Pizzas!') }}</h1>
            <p>{{ __('Este sistema te permite gestionar las pizzas, sus ingredientes y precios a través de una interfaz intuitiva. A continuación, encontrarás detalles sobre cómo interactuar con la API y cómo iniciar sesión en el backoffice.') }}</p>
        </div>

        <!-- Sección de Información de la API -->
        <div class="col-12 mt-4">
            <h2>{{ __('Información de la API') }}</h2>
            <p>{{ __('Para interactuar con las pizzas, ingredientes y precios, puedes utilizar el siguiente endpoint de la API:') }}</p>
            <pre>
                <code>
                    GET /api/pizzas
                    - Descripción: Recupera una lista de todas las pizzas, incluidos sus ingredientes y precios calculados.
                </code>
            </pre>
            <p>{{ __('En este sistema, se ha utilizado el patrón Repository para separar la lógica de acceso a los datos. Esto permite una mayor modularidad y facilita la gestión de las consultas a la base de datos. La lógica de negocio y la gestión de los datos están desacopladas, lo que hace que el código sea más limpio, más fácil de mantener y extender.') }}</p>
            <p>{{ __('El Repository actúa como una capa intermedia entre la base de datos y el controlador, lo que permite encapsular las consultas SQL y las interacciones con los modelos de Eloquent, proporcionando métodos específicos para acceder a los datos de manera eficiente.') }}</p>
        </div>

        <!-- Sección de Información para el Backoffice -->
        <div class="col-12 mt-4">
            <h2>{{ __('Información para Iniciar Sesión en el Backoffice') }}</h2>
            <p>{{ __('Para acceder al panel de administración (backoffice) y gestionar las pizzas, por favor ingresa con las siguientes credenciales:') }}</p>
            <ul>
                <li><strong>{{ __('Nombre de usuario:') }}</strong> <em>test@example.com</em></li>
                <li><strong>{{ __('Contraseña:') }}</strong> <em>password</em></li>
            </ul>
            <p>{{ __('Después de iniciar sesión, podrás crear, editar y eliminar pizzas, así como gestionar sus ingredientes.') }}</p>
            <p>{{ __('Para iniciar sesión, ve a:') }} <a href="{{ route('login') }}">{{ route('login') }}</a></p>
            
            <!-- Información sobre Tests -->
            <h3>{{ __('Pruebas Realizadas') }}</h3>
            <p>{{ __('Se han realizado pruebas automáticas para asegurar que el sistema funciona correctamente. Las pruebas cubren los siguientes aspectos:') }}</p>
            <ul>
                <li>{{ __('Cálculo correcto del precio de las pizzas, verificando que el precio se calcule adecuadamente con los ingredientes asociados.') }}</li>
                <li>{{ __('Métodos del PizzaController, asegurando que las acciones como la creación, actualización y eliminación de pizzas funcionen como se espera.') }}</li>
                <li>{{ __('Acceso autenticado a las rutas protegidas, verificando que solo los usuarios autenticados puedan acceder a las rutas de administración y gestión de pizzas.') }}</li>
            </ul>
            <p>{{ __('Estos tests aseguran que las funcionalidades críticas del sistema estén funcionando correctamente y sin errores.') }}</p>
            
            <!-- Información sobre Sail -->
            <h3>{{ __('El Proyecto está Montado sobre Sail') }}</h3>
            <p>{{ __('Este proyecto está ejecutándose dentro de un contenedor Docker utilizando Laravel Sail, lo que facilita la configuración del entorno de desarrollo. Sail proporciona una manera sencilla y rápida de configurar las dependencias del proyecto, como la base de datos, el servidor web y otras herramientas necesarias para el desarrollo.') }}</p>
            <p>{{ __('Para instanciar el proyecto y preparar la base de datos, solo tienes que ejecutar el siguiente comando:') }}</p>
            <pre><code>sail artisan migrate:fresh --seed</code></pre>
            <p>{{ __('Este comando limpiará la base de datos, aplicará las migraciones y sembrará los datos de prueba (si están disponibles), dejándola lista para usar.') }}</p>
            <p>{{ __('Gracias a Sail, el proceso de despliegue y pruebas es más ágil, ya que todo el entorno se puede ejecutar de manera local sin conflictos con otras configuraciones de sistema.') }}</p>
        </div>
    </div>
</div>
@endsection
