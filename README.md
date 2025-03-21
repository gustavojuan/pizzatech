
# Sistema de Gestión de Pizzas

## Descripción

Este sistema te permite gestionar las pizzas, sus ingredientes y precios a través de una interfaz intuitiva. A continuación, se explica cómo interactuar con la API y cómo iniciar sesión en el panel de administración (backoffice).

## Información de la API

Para interactuar con las pizzas, ingredientes y precios, puedes utilizar el siguiente endpoint de la API:

```http
GET /api/pizzas
```

- **Descripción**: Recupera una lista de todas las pizzas, incluidos sus ingredientes y precios calculados.

En este sistema, se ha utilizado el patrón **Repository** para separar la lógica de acceso a los datos. Esto permite una mayor modularidad y facilita la gestión de las consultas a la base de datos. La lógica de negocio y la gestión de los datos están desacopladas, lo que hace que el código sea más limpio, más fácil de mantener y extender.

El **Repository** actúa como una capa intermedia entre la base de datos y el controlador, lo que permite encapsular las consultas SQL y las interacciones con los modelos de Eloquent, proporcionando métodos específicos para acceder a los datos de manera eficiente.

## Información para Iniciar Sesión en el Backoffice

Para acceder al panel de administración (backoffice) y gestionar las pizzas, por favor ingresa con las siguientes credenciales:

- **Nombre de usuario**: test@example.com
- **Contraseña**: password

Después de iniciar sesión, podrás crear, editar y eliminar pizzas, así como gestionar sus ingredientes.

Para iniciar sesión, ve a: [Login](http://tusitio.com/login).

### Pruebas Realizadas

Se han realizado pruebas automáticas para asegurar que el sistema funciona correctamente. Las pruebas cubren los siguientes aspectos:

- **Cálculo correcto del precio de las pizzas**, verificando que el precio se calcule adecuadamente con los ingredientes asociados.
- **Métodos del PizzaController**, asegurando que las acciones como la creación, actualización y eliminación de pizzas funcionen como se espera.
- **Acceso autenticado a las rutas protegidas**, verificando que solo los usuarios autenticados puedan acceder a las rutas de administración y gestión de pizzas.

Estas pruebas aseguran que las funcionalidades críticas del sistema estén funcionando correctamente y sin errores.

## El Proyecto está Montado sobre Sail

Este proyecto está ejecutándose dentro de un contenedor Docker utilizando **Laravel Sail**, lo que facilita la configuración del entorno de desarrollo. Sail proporciona una manera sencilla y rápida de configurar las dependencias del proyecto, como la base de datos, el servidor web y otras herramientas necesarias para el desarrollo.

### Para Instanciar el Proyecto

Para instanciar el proyecto y preparar la base de datos, solo tienes que ejecutar el siguiente comando:

```bash
sail artisan migrate:fresh --seed
```

Este comando limpiará la base de datos, aplicará las migraciones y sembrará los datos de prueba (si están disponibles), dejándola lista para usar.

Gracias a Sail, el proceso de despliegue y pruebas es más ágil, ya que todo el entorno se puede ejecutar de manera local sin conflictos con otras configuraciones de sistema.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.
