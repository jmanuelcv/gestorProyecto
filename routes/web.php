<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\facturasController;
use App\Http\Controllers\cvController;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\profileController;

use App\Http\Controllers\tareasController;

/* Agrupo las rutas para comprobar si se ha iniciado sesión
 */
Route::group(['middleware' => ['auth','estado']], function () {

        //Acceso general 
        route::get('/perfil', [profileController::class, 'index'])->name('perfil');
        Route::post('/password',[userController::class, 'pass'])->name('password');
        route::get('/tareas', [tareasController::class, 'index'])->name('tareas');
        Route::get('/estadoTarea/{id}/{estado}', [tareasController::class, 'estadoTarea'])->name('estadoTarea');

        Route::middleware('auth', 'role:RRHH')->group(function () {
                        //usuarios
                        Route::post('/newUser', [userController::class, 'newUser'])->name('newUser');
                        Route::get('/usuarios', [userController::class, 'index'])->name('usuarios');
                        Route::get('/editar/{id}', [userController::class, 'editar'])->name('editar');
                        Route::post('/update/{id}', [userController::class, 'update'])->name('update');
                        Route::get('/estado/{id}/{estado}', [userController::class, 'estado'])->name('estado');

                        //Empleado
                        Route::get('/empleados', [empleadosController::class, 'index'])->name('empleados');
                        Route::get('/editarEmployee/{id}', [empleadosController::class, 'editar'])->name('editarEmployee');
                        Route::post('/updateEmployee/{id}', [empleadosController::class, 'update'])->name('updateEmployee');
                        Route::post('/newEmployee', [empleadosController::class, 'newEmployee'])->name('newEmployee');
                        Route::get('/eliminarEmployee/{id}', [empleadosController::class, 'eliminar'])->name('eliminarEmployee');
                        //C.V
                        Route::get('/curriculum', [cvController::class, 'index'])->name('curriculum');
                        Route::get('/eliminarCv/{id}', [cvController::class, 'eliminar'])->name('eliminarCv');

                    });

        Route::middleware('auth', 'role:Finanzas')->group(function () {
                        //Clientes
                        Route::get('/clientes', [clientesController::class, 'index'])->name('clientes');
                        Route::get('/editarCliente/{id}', [clientesController::class, 'editar'])->name('editarCliente');
                        Route::post('/updateCustomer/{id}', [clientesController::class, 'update'])->name('updateCustomer');
                        Route::post('/newCcustomer', [clientesController::class, 'newCustomer'])->name('newCustomer');
                        Route::get('/eliminarCcustomer/{id}', [clientesController::class, 'eliminar'])->name('eliminarCustomer');
                        //Estadisticas
                        Route::get('/estadisticas', [facturasController::class, 'estadisticas'])->name('estadisticas');
                        //Facturas
                        Route::get('/facturas', [facturasController::class, 'index'])->name('facturas');
                        Route::post('/new', [facturasController::class, 'new'])->name('new');
                        Route::get('/eliminar/{id}', [facturasController::class, 'eliminar'])->name('eliminar');
                    });                  

        Route::middleware('auth', 'role:Admin')->group(function () {
                        Route::post('/nuevaTarea', [tareasController::class, 'nuevaTarea'])->name('nuevaTarea');
                        Route::get('/editarTareas/{id}', [tareasController::class, 'editarTareas'])->name('editarTareas');
                        Route::post('/updateTareas/{id}', [tareasController::class, 'updateTareas'])->name('updateTareas');
                        Route::get('/eliminarTareas/{id}', [tareasController::class, 'eliminarTareas'])->name('eliminarTareas');
                        });
                                
});

//rutas publicas
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/denegado', ['as' => 'denegado', function() {
    return view('errors/401');
}]);

//crear cv
Route::post('/newCv', [cvController::class, 'newCv'])->name('newCv');

