<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rota teste
/*
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::get('/usuarios', function () {
        return "Área ADMIN - Usuários";
    });
});
*/
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::resource('/usuarios', UserController::class);//CRUD usuarios
    Route::resource('permissoes', PermissionController::class)
    ->parameters([
        'permissoes' => 'permission'
    ]);//CRUD Permissões

    Route::get('/setores-hospitalares', function () {
        return view('modules.setores');
    });

    Route::get('/especialidades-medicas', function () {
        return view('modules.especialidades');
    });

    Route::get('/equipamentos', function () {
        return view('modules.equipamentos');
    });

    Route::get('/unidades-assistenciais', function () {
        return view('modules.unidades');
    });

});



require __DIR__.'/auth.php';
