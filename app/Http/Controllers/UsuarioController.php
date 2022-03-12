<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function createUser(Request $request){
        $usuario = (object)json_decode($request->data);

        $exist_user = Usuario::where('username',$usuario->username)->first();
        $exist_email = Usuario::where('email',$usuario->email)->first();
        $response = [];

        if($exist_user){
            $response = [
                'success'=>false,
                'message'=>'User already exists',
                'data'=>false
            ];
        }else if ($exist_email){
            $response = [
                'success'=>false,
                'message'=>'Email already exists',
                'data'=>false
            ];
        }else{
            $us = new Usuario();
            $us->idPerson = $usuario->idPerson;
            $us->username=$usuario->username;
            $us->rol=$usuario->rol;
            $us->password=Hash::make($usuario->password);
            $us->email=$usuario->email;
            $us->status=$usuario->status;

            $us->save();
            $response = [
                'success'=>true,
                'message'=>'User created',
                'data'=>$us
            ];
        }


        return response()->json($response);
    }

    public function getUsers(){
        $users=Usuario::all();
        $response = [];
        if(sizeof($users)!=0){
            $response = [
                'success'=>true,
                'message'=>'This is all users from database',
                'data'=>$users
            ];
        }else{
            $response = [
                'success'=>false,
                'message'=>'Empty users information on database',
                'data'=>false
            ];
        }
        return response()->json($response);
    }

    public function searchUser(Request $request){
        $user = (object)json_decode($request->data);
        $response = [];
        $exist_user = Usuario::where('username',$user->username)->first();
        if($exist_user){
            if(Hash::check($user->password,$exist_user->password)){
                $response = [
                    'success' => true,
                    'message' => 'Welcome to the app',
                    'data' => $exist_user,
                    'url' => '/crud'
                ];
            }else{
                $response = [
                    'success' => false,
                    'message' => 'password doesnt match',
                    'data' => false,
                    'url' =>false
                ];
            }

        }else{
            $response = [
                'success' => false,
                'message' => 'user doesnt match',
                'data' => false,
                'url' => false
            ];
        }
        return response()->json($response);

    }
}
