# Rutas
Las rutas se que existen en la aplicación son definidas en el archivo `routes\web.php`:

```php 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('dashboard', [DashboardController::class, 'index']);

require __DIR__.'/auth.php';

Route::resource('equipment', EquipmentController::class); Route::resource('collaborator', CollaboratorController::class); 
Route::resource('collaborator/petition', PetitionController::class);
Route::resource('collaborator/equipment', EquipmentController::class); 
Route::resource('petition', PetitionController::class);
Route::get('petition/{petition}', [PetitionController::class,'showPetition']);
Route::get('petition/{petition}/{FileID}', [PetitionController::class, 'showPDF']);
Route::get('petition/{petition}/{FileID}/sendEmail', [PetitionController::class, 'sendEmail']); //Muestra el det
Route::get('petition/{petition}/{FileID}/sign', [PetitionController::class, 'showPDFSign']);
Route::get('petition/{petition}/{FileID}/validation', [PetitionController::class, 'validationPetition']);
Route::put('petition/{petition}', [PetitionController::class,'validatePetition']);
Route::post('petition/{petition}', [PetitionController::class, 'updateFile'])->name('petition.updateFile');
Route::resource('user', UserController::class)->middleware('admin');
Route::resource('projects', ProjectController::class); 
Route::resource('databases', DatabaseController::class); 
Route::resource('enterprise', EnterpriseController::class); 
```
Estas rutas redireccionan a cada una de las paginas que se visualizaran, pero unas pocas son para poder ejecutar funciones dentro de la misma pagina.

Cuando colocamos la ruta en el navegador automaticamente llama a una funcion dentro del controlador especificado. Existen varios tipos de rutas:

---

## Resource
Las rutas que comienzan con un resource hacen referencia a funciones ligadas por defecto en laravel, estas funciones tiene nombres con relacion a CRUD (Create, Read, Update, Delete). 

En terminos simple, se puede acceder a multiples rutas apartir de una sola sentencia en este arhivo:

Ejemplo:
Si declaramos:
```php
Route::resource('enterprise', EnterpriseController::class); 
```
Y suponiendo que el proyecto corre de manera local en el navegador accedemos a la ruta `localhost:8000/enterprise` haremos un llamado a la funcion index dentro del controlador
```php
public function index(){
    //logica
}

```
Si accedemos a la ruta `localhost:8000/enterprise/create` haremos un llamado a la funcion `create` dentro del mismo controlador:
```php
public function create()
    {
    //logica
    }
```
Y por ultimos si accedemos a la ruta `localhost:8000/enterprise/store` llamaremos a la funcion con el nombre `store`:
```php
public function store (Request $request)
{
    //logica
}
```

Y asi sucesivamente, las rutas estan relacionadas con las funciones, pero aun existen otros tipos de funciones.

---

## Get
Las funciones get en las rutas hacen referencina a los mismo que en las rutas anterios con la diferencia que estas rutas tiene mas campos personalizables a la hora de hacer un llamado.
Por ejemplo, si desglosamos la siguiente ruta:
```php 
Route::get('petition/{petition}', [PetitionController::class,'showPetition']);
```
La ruta te permite escojer el nombre de la ruta sin estar correlacionada con la funcion, si en el navegador colocamos la ruta `localhost:8000/petition/1` hara el llamado a la funcion `showPetition`
La razon por la que se utiliza `{petition}` es porque en la url hace referencia a un parametro que pasara al momento de querer acceder la ruta y sera utilizado en la función `showPetition` como se compara en la ruta y la funcion:
```html
<a href="/petition/{{ $petition->id }}" alt="ver" class="col-md-1 fas fa-eye"></a>
```
```php
public function showPetition($id)
{
   $equipments   = Equipment::all();
    $petition     = Petition::find($id);
    $collaborator = Collaborator::find($id);
    $this->verifyStatus($petition);
    return view('collaborator/petition/showPetition', compact('petition', 'collaborator', 'equipments'));
}
```

---

## PUT

Continuando con las de tipo PUT, `Route::put` es una función que se utiliza para definir una ruta para la solicitud HTTP PUT. PUT en terminos simples es uno de los métodos HTTP que se utilizan para actualizar los datos existentes en un servidor web. La definición de una ruta PUT en Laravel permite al servidor web recibir solicitudes PUT para esa ruta específica y procesar la información enviada en la solicitud.

```php
Route::put('petition/{petition}', [PetitionController::class,'validatePetition']);
```
---
# POST
Por otro lado las `Route::post` es una función que se utiliza para definir una ruta para la solicitud HTTP POST. POST es uno de los métodos HTTP que se utilizan para enviar datos desde un cliente a un servidor web para crear o actualizar recursos. La definición de una ruta POST en Laravel permite al servidor web recibir solicitudes POST para esa ruta específica y procesar la información enviada en la solicitud.
```php 
Route::post('petition/{petition}', [PetitionController::class, 'updateFile'])->name('petition.updateFile');
```

---

## NAME
Como dato extra, en este proyecto se utilizan las etiquetas `->name()` para poder acortar el nombre de la ruta dentro del
proyecto, es un identificador unico que es utilizado comunmente cuando nuestra ruta es muy extensa:

```php 
Route::post('petition/{petition}', [PetitionController::class, 'updateFile'])->name('petition.updateFile');
```

```html
<form action="{{ route('petition.updateFile', $petition->id) }}" method="POST"
enctype="multipart/form-data">

</form>
```
---

## MIDDLEWARE

Los middleware son utilizado en las rutas para limitar el acceso a rutas, las restricciones pueden ser definidas para que uno no pueda acceder directamente, restricciones de acceso sin antes logearse en la plataforma o para restringir el acceso a un tipo de usuario. Para poder crear un middleware es necesario ejecutar el siguiente comando 
```bash
php artisan make:middleware NOMBRE_MIDDLEWARE
```
Al terminar la creacion generará un nuevo archivo de middleware en la carpeta `app/Http/Middleware`, en este archivo debes crear la logica correspondiente a lo que quieres restringir, para poder agregarlo a una ruta debemos definirlo en un el archivo `app/Http/Kernel.php`, suponiendo que nuestro middleware es llama `myMiddleware`, se definiria de la siguiente forma en `Kernel.php`:
```php
'myMiddleware' => \App\Http\Middleware\MyMiddleware::class,
```
Y en la ruta que deseamos aplicar este middleware debemos agragarle esta extension `->middleware()`:
```php 
Route::get(/*ruta y controlador*/)->middleware('myMiddleware');
```

Este apartdo es importante para poder comprender el flujo de la aplicación.
Para conocer mas a detalle la aplicación se recorrera cada ruta para poder entender el flujo. [Indice de rutas](./02_01_indice.md)

