<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function createPerson(Request $request){
        $person = (object)json_decode($request->data);
       // $person = $request;
        $exist_name = Person::where('name',$person->name)->first();
        $exist_lastname = Person::where('lastname',$person->lastname)->first();
        $exist_phone = Person::where('phone',$person->phone)->first();
        $response = [];

        if($exist_name){
            $response = [
                'success'=>false,
                'message'=>'name already exists',
                'data'=>false
            ];
        }else if ($exist_lastname){
            $response = [
                'success'=>false,
                'message'=>'lastname already exists',
                'data'=>false
            ];
        }else if($exist_phone){
            $response = [
                'success'=>false,
                'message'=>'phone already exists',
                'data'=>false
            ];
        }else{
            $pr = new Person();
            $pr->name = $person->name;
            $pr->lastname = $person->lastname;
            $pr->phone = $person->phone;
            $pr->direction = $person->direction;
            $pr->status = $person->status;

            $pr->save();
            $response = [
                'success'=>true,
                'message'=>'Person created',
                'data'=>$pr
            ];
        }


        return response()->json($response);
    }


    public function getPersons(){
        $person=Person::all();
        $response = [];
        if(sizeof($person)!=0){
            $response = [
                'success'=>true,
                'message'=>'This is all persons from database',
                'data'=>$person
            ];
        }else{
            $response = [
                'success'=>false,
                'message'=>'Empty persons information on database',
                'data'=>false
            ];
        }
        return response()->json($response);
    }

    public function deletePerson($idPerson){
        $find = Person::find($idPerson);
        $response = [];
        if($find==null){
            $response = [
                "success"=>false,
                "message"=>"No data found",
                "data"=>false
            ];
        }else{
            $find->delete();
            $current = Person::all();
            $response = [
                "success"=>true,
                "message"=>"Person identified and deleted",
                "data"=>$current
            ];
        }
        
        
        return response()->json($response);
        
    }

    
}
