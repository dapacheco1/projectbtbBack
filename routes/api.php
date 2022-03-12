<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/users',[UsuarioController::class,'getUsers']);
Route::post('/users',[UsuarioController::class,'createUser']);

//person API
Route::get('/persons',[PersonController::class,'getPersons']);
Route::post('/persons',[PersonController::class,'createPerson']);
Route::delete('/persons/{id}',[PersonController::class,'deletePerson']);
