<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PersonController;

class UsuarioController extends Controller
{
    public function createUser(Request $request){
        $data = (array)json_decode($request->data);
        $usuario = $data["user"];
        $person = $data["person"];
        $response = [];

        //validate person
        $search = new PersonController;
        $res = $search->createPerson($person);
        
        if($res['success']){
            $id = $res['data']['id'];
            $exist_user = Usuario::where('username',$usuario->username)->first();
            $exist_email = Usuario::where('email',$usuario->email)->first();
            
            if($exist_email || $exist_user){
                $deletep = new PersonController;
                $resDel = $deletep->deletePerson($id);//debug message
            }
    
            if($exist_user){
                $response = [
                    'success'=>false,
                    'message'=>'Cannot create user: User already exists',
                    'data'=>false
                ];

                
            }else if ($exist_email){
                $response = [
                    'success'=>false,
                    'message'=>'Cannot create user: Email already exists',
                    'data'=>false
                ];
                
            }else{
                
                $us = new Usuario();
                $us->idPerson = $id;
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
        }else{
            $response = [
                'success'=>false,
                'message'=>'Cannot create user: '.$res['message'],
                'data'=>false
            ];
        }

        


        return response()->json($response);
    }

    public function getUsers(){
        $users=Usuario::all();
        
        $response = [];
        if(sizeof($users)!=0){
            $auxPrs = new PersonController;
            $search = [];
            foreach($users as $user){
                array_push($search,$auxPrs->getPersonById($user["idPerson"]));
            }
            
            
            $response = [
                'success'=>true,
                'message'=>'This is all users from database',
                'data'=>array($users,$search)
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
        //$user = (object)json_decode($request->data);
        $user = $request;
        $response = [];
        $exist_user = Usuario::where('username',$user->username)->first();
        if($exist_user){
            if(Hash::check($user->password,$exist_user->password)){
                $response = [
                    'success' => true,
                    'message' => 'Welcome to the app',
                    'data' => $exist_user
                ];
            }else{
                $response = [
                    'success' => false,
                    'message' => 'password doesnt match',
                    'data' => false
                ];
            }

        }else{
            $response = [
                'success' => false,
                'message' => 'user doesnt match',
                'data' => false
            ];
        }
        return response()->json($response);

    }

    public function deleteUser($id){
        $find = Usuario::find($id);
        $response = [];
        if($find==null){
            $response = [
                "success"=>false,
                "message"=>"No data found"
            ];
        }else{
            $auxP = new PersonController;
            $deleteP =$auxP->deletePerson($find->idPerson);
            if($deleteP["success"]){
                $find->delete();
                $response = [
                    "success"=>true,
                    "message"=>"Person identified and deleted"
                ];
            }else{
                $response = [
                    "success"=>false,
                    "message"=>"An error has occurred"
                ];
            }
           
        }
        
        
        return $response;
    }
}
