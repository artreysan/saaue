# Solicitudes

Las solicitudes en el proyecto tiene como correspondiente una realcion a su definicion en ingles "Petitions", todo en esta sección esta relacionado con la solicitudes que los Externos generan:

```php
Route::resource('petition', PetitionController::class);
Route::get('petition/{petition}', [PetitionController::class,'showPetition']);
Route::get('petition/{petition}/{FileID}', [PetitionController::class, 'showPDF']);
Route::get('petition/{petition}/{FileID}/sendEmail', [PetitionController::class, 'sendEmail']);
Route::get('petition/{petition}/{FileID}/sign', [PetitionController::class, 'showPDFSign']);
Route::get('petition/{petition}/{FileID}/validation', [PetitionController::class, 'validationPetition']);
```
---

## Raiz [http://127.0.0.1:8000/petition](http://127.0.0.1:8000/petition)

`Route::resource('petition', PetitionController::class);`

La ruta raiz en su definicion nos indica que tiene una relacion con las funciones del controlador, por lo que al moento de ingresar a esa ruta se hara un llamado a la función de de `index()`. Esta función realiza una busqueda de las solicitudes relacionada con el tipo de usuario, si es un usuario Externo (Tipo 3), retornara solo las solicitudes que tengan su ID, el ID fue cargado al momento de generar la Solicitud. Si es un usuario Administrador o Editor, consultara todas las solicitudes en el sistema:

```php 
public function index(){
    if(auth()->user()->role_id == 3){
        $petitions = Petition::where('user_id','=', auth()->user()->id)->get();
    }
    else{
        $petitions = Petition::all();
    }
    return view('petitions/index', compact('petitions'));
}
```

Si no existe ningun inconveniente se retornara la vista siguiente con un parametro `petitions` que es un arreglo de objetos con el Modelo de `Petitions`.

![Vista de la Raiz de las rutas para las solicitude](./02_06_petition_01.png)
