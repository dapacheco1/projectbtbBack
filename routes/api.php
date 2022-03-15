<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/users',[UsuarioController::class,'getUsers']);
Route::post('/users',[UsuarioController::class,'createUser']);
Route::post('/users/validate',[UsuarioController::class,'searchUser']);
Route::delete('/users/{id}',[UsuarioController::class,'deleteUser']);