# Ruta de proyectos 
```php 
Route::resource('projects', ProjectController::class); 
``` 
Esta ruta tiene una relación a las funciones definidas en el controlador de `app\Http\Controllers\ProjectController.php`. Por lo que la función `index()` corresponde a la raíz del proyecto. 
  
## Ruta raíz 
```php 
public function index() 
{ 
	$users	= User::all(); 
	$projects = Project::all(); 
	return view('projects/index', compact('projects','users')); 
} 
``` 
En esta función principalmente consulta todos los registros en usuarios y proyectos de la base de datos, haciendo referencia a los modelos para enviarlos por parámetros. Posteriormente retorna la vista en `resources\views\projects\index.blade.php`: 
![Vista de proyectos](./02_07_projects_01.png) 
