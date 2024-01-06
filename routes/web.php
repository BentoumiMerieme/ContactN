<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\naltis_contactsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/naltis_contacts',[naltis_contactsController::class, 'index'])->name('naltis_contacts.index');
Route::get('/naltis_contacts/liste',[naltis_contactsController::class, 'liste'])->name('naltis_contacts.liste');
Route::post('/naltis_contacts',[naltis_contactsController::class, 'ajouter'])->name('naltis_contacts.ajouter');
Route::get('/naltis_contacts/{naltis_contacts}/edit',[naltis_contactsController::class, 'edit'])->name('naltis_contacts.edit');
Route::put('/naltis_contacts/{naltis_contacts}/update',[naltis_contactsController::class, 'update'])->name('naltis_contacts.update');
Route::delete('/naltis_contacts/{naltis_contacts}/destroy',[naltis_contactsController::class, 'destroy'])->name('naltis_contacts.destroy');
Route::get('/naltis_contacts/add',[naltis_contactsController::class, 'add'])->name('naltis_contacts.add');


