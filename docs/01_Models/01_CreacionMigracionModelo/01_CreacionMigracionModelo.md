## Como hacer una migracion y un modelo nuevo
Para poder hacer un migracion junto a un modelo en la raiz del proyecto se ejecuta los siguientes comandos:

### Migración
Para crear una migracion se utiliza:
```bash
php artisan make:migration nombre_de_la_migracion
```
Ejemplo:
```bash
php artisan make:migration Desarrollador
```
Se crea un archivo en `.\database\migrations` que contiene la estructura siguiente, y nosotros le agregamos los atributos, name, email, password:
```php 
Schema::create('desarrollador', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->timestamps();
});
```
Y para modificar la base de datos creando la tabla Desarrollador con sus campos ejecutamos en terminal:
```bash
php artisan migrate
```
### Modelo

Para crear un modelo ejecutamos el siguiente comando:
```bash
php artisan make:model NombreDelModelo
```
Ejemplo: 
Creando el modelo: 
```bash
php artisan make:model Desarrollador
```
Agregamos los atributos que tenia la migración:
```php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Desarrollador extends Model
{
    protected $fillable = ['name', 'email', 'password'];
}
```

Y listo ahora podemos usar el modelo Desarrollador para interactuar con la tabla "users" en tu base de datos. Por ejemplo, puedes crear un nuevo usuario con el siguiente código:

```php
$dev = new Desarrollador;
$dev->name = 'John Doe';
$dev->email = 'john.doe@example.com';
$dev->password = bcrypt('password');
$dev->save();
```

---
## Agreagar mas campos a un Modelo y Migracion ya creados

Si la migración original ya esta corriendo hacemos uso de migraciones extras:
Tomando el ejemplo anterior en terminal se ejecuta el siguiente comando:
```php
php artisan make:migration add_campos_a_desarrollador_table --table=desarrollador
```
que nos creara un archivo llamado `add_campos_a_dearrollador_table`, en este archivo se modifica la parte de:

```php
Schema::table('desarrollador', function (Blueprint $table) {
    $table->integer('age')->nullable();
});
```
Guardamos la modificación y ejecutamos el siguiente comando para poder visualizarlo en la base de datos:
```bash
php artisan migrate
```
Por ultimo modificamos el modelo original de Desarrollador y en el arreglo de los atributos colocamos la el nombre del campo que agregamos:
```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'age'];
}
```

Y ya podemos usar el nuevo atributo en cada entidad:
```php 
$user = new User;
$user->name = 'John Doe';
$user->email = 'john.doe@example.com';
$user->password = bcrypt('password');
$user->age = 30;
$user->save();
```
