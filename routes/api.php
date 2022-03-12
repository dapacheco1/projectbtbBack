<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/users',[UsuarioController::class,'getUsers']);
Route::post('/users',[UsuarioController::class,'createUser']);
