<?php

use App\Http\Controllers\AlunosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [AlunosController::class, 'index'])->name('alunos.index');
Route::get('/create', [AlunosController::class, 'create'])->name('alunos.create');
Route::post('/store', [AlunosController::class, 'store'])->name('alunos.store');
Route::get('/edit/{id}', [AlunosController::class, 'edit'])->name('alunos.edit');
Route::put('/update/{id}', [AlunosController::class, 'update'])->name('alunos.update');
Route::delete('/delete/{id}', [AlunosController::class, 'destroy'])->name('alunos.destroy');
