# Pruebas Laravel
- Version de laravel 11
- Version de PHP 8.2.12
- Version de XAMPP para windows 8.2.12
- Version de control panel v3.3.0

# Instalacion de dependencias: requiere instalar composer previamente
- Instalar dependencias desde composer `composer install`

## comandos basicos

`php artisan serve // inicia el servidor`
`php artisan make:controller <Nombre>Controller`
`php artisan make:component <nombre>` -- componentes dependientes de clases
`php artisan migrate` -- crea ciertas tablas en la bd, funciona parecido a un control de versiones
`php artisan migrate:rollback` -- elimina las ultimas tablas creadas, accede a cada .php de migracion y ejecuta el metodo down
`php artisan make:migration <nombre>` -- nos permite crear nuestra propia migracion,
`php artisan make:migration create_posts_table` -- creamos una migracion con template de id y timestamps por defecto,
`php artisan migrate:refresh` -- ejecuta todos los metodos down() de todas las migraciones en todos los lotes. y luego ejecuta todos los up()
basicamente hace rollbacks y luego migrates, y las pone en el mismo lote 1
`php artisan migrate:fresh` -- similar al anterior, no ejecuta los metodos down(), pero elimina todas las tablas en la bd y las levanta nuevamente.
`php artisan make:migration add_avatar_to_users_table` --
`php artisan make:model <nombre>` --
`php artisan db:seed` -- ejecuta el metodo run de los seeders
`php artisan make:seeder <NombreSeeder>` -- crea un seeder
`php artisan r:l` -- lista todas las rutas definidas en el proyecto (web.php)
`php artisan route:list --name=<nombre ruta base>` -- lista todas las rutas definidas que usan la ruta especificada
`php ` -- lista todas las rutas definidas que usan la ruta especificada

## estructura proyecto simplificada

/<proyecto>
├── /public -- url donde se ve el proyecto funcionando
└── /routes
    └── web.php -- donde manejamos las rutas
└── /app
    └── /Http
        ├── /Controllers
        ├── Controller.php
        ├── HomeController.php
        └── otros controladores...
    └── /Modles
        ├── /User.php
        └── otros modelos de datos...
    └── /Providers
        ├── /AppServiceProviders.php
        └── otros proveedores...
    └── /config
        ├── /app.php
        └── otros scripts de configuraciones...
    └── /resources
        ├── /css
        ├── /js
        └── /views
            ├── welcome.blade.php
            └── otras plantillas blade...
    └── /vendor -- donde se instalan las dependencias y paquetes
└── README.md


### MIGRACIONES
- Al crear una nueva migracion / tabla, laravel automaticamente detecta y crea un nuevo valor de batch / lote en la tabla migraciones
- por ello, si con la nueva tabla, ahora ejecutamos artisan migrate:rollback, llama al metodo down() de la ultima migración, elimina la ultima tabla
- y volvemos a tener el esquema anterior
- por ejemplo cuando nos olvidamos de cargar un campo correctamente 
- tanto migrate:rollback, refresh, o fresh, son metodos destructivos, por eso:
    - cuando queramos modificar datos de una tabla y ya tengamos datos guardados
    - usamos migraciones tambien para modificar tablas que ya existen
    - artisan make:migration add_<field>_to_<entity>_table no ejecuta Schema::create, sino Schema::table y no se ven todos
     los campos en el script de migracion, sino solamente el nuevo
    - es ideal cuando ya tengamos una bd anteriormente creada, o tengamos tablas.


### MODELOS
- Se crean con `php artisan make:model <nombre>`
- Se guardan en app/Models
- Son clases que en algún punto, contienen información realacionada a las tablas presentes en la bd
- 


### CASTING
- Se crean en el modelo al que queremos hacer casteos de ciertos campos
- protected function casts(): array ...
- Lo que casteamos no solo transforma a la hora de recuperar datos, sino tambien en subida de datos
- ej: 'prueba' => 'integer' // 46.5 => 46
- 

### SEEDERS
- Los seeders en Laravel son herramientas que se utilizan para llenar la base de datos con datos iniciales o de prueba. Esto es especialmente útil en las etapas de desarrollo
- Integración con Factories: Los seeders pueden trabajar junto con las factories de Laravel, que permiten generar datos falsos de manera más elaborada
- Es una herramienta que nos permite decir que registros queremos que esten presentes siempre cuando creemos una tabla
- `php artisan db:seed --class=UsersTableSeeder`
- Se pueden combinar con migrate:fresh `php artisan migrate:fresh --seed` elimina las tablas, las crea nuevamente y ejecuta los seeders
- 
- 


### FACTORY / FACTORIES
- permite generar instancias de modelos con datos ficticios de manera sencilla y rápida
- Permiten insertar registros en las tablas, se usan en combiancion con seeders
- Funcionan como fabricas, donde dejamos dicho que queremos que se cree en cada capo
en base a la informacion dada crea registros
- `php artisan make:factory NombreDelFactory --model=Modelo` ej `php artisan make:factory UserFactory --model=User`
- Esto generará un archivo UserFactory.php, donde podrás definir cómo se deben crear las instancias de User



- ### ROUTE NAMING / BINDING ROUTES
- route naming nos permite establecer rutas no harcodeadas, las cuales podemos renombrar desde nuestro archivo de rutas, y afectara tanto a las mismas rutas, metodos, resource por defecto, y las vistas. sirve muchisimo por si nos piden que cambiemos esas cosas en un futuro de manera agil
- binding route nos permite establecer ids por defecto en nuestros objetos de referencia tanto para controladores y vistas, 
ya que podemos de esta manera establecer diferentes identificadores de los mismos en diferentes puntos de la aplicacion.
por ejemplo $post->id, $post (haciendo referencia al slug o title) y esto hace la url amigable


- ### ASIGNACION MASIVA / MASS ASSIGNAMENT
- No permite ahorrar codigo en caso de formularios de muchos campos, donde directamente rescatamos dichos valores del objeto $request de l controlador
- 


- ### VALIDACIONES EN FORMULARIOS
- Creamos las validaciones necesarias en los controladores antes de querer cargar contenido a la bd
- En los formularios usamos la directiva if($errors->any()) buscando por errores en la carga
    Este campo es un arreglo que podemos iterar mostrando dichos errores
- Podemos mostrar los errores todos juntos, o por separado debajo de cada entrada
- Por otro lado, tambien podemos guardar el valor en memoria de los campos que si fueron correctos.
    De esta manera el usuario no tiene que volver a cargar todos los campos nuevamente. usando funcion {{old('<campo>')}}
- Old tiene un segundo parametro, es ideal para el caso de los formularios de edicion, donde si hay error en un campo
    volvera al valor old aquellos que se enviaron vacios, y los que no dieron error el ultimo valor que se intentó cargar





