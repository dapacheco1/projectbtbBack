<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function createPerson(object $person){
        $exist_phone = Person::where('phone',$person->phone)->first();
        $response = [];

       if($exist_phone){
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


        return $response;
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
        return $response;
    }

    public function deletePerson($idPerson){
        $find = Person::find($idPerson);
        $response = [];
        if($find==null){
            $response = [
                "success"=>false,
                "message"=>"No data found"
            ];
        }else{
            $find->delete();
            $response = [
                "success"=>true,
                "message"=>"Person identified and deleted"
            ];
        }
        
        
        return $response;
        
    }

    public function getPersonById($idPerson){
        $find = Person::find($idPerson);
        $response = [];
        if($find==null){
            $response = [
                "success"=>false,
                "message"=>"No data found",
                "data"=>false,
            ];
        }else{
            $response = [
                "success"=>true,
                "message"=>"Person identified",
                "data"=>$find
            ];
        }
        
        
        return $response;
    }

    public function updatePerson($idPerson,$data){

        $find = Person::find($idPerson);
        $response = [];
        
        if($find==null){
            $response = [
                "success"=>false,
                "message"=>"No data found"
            ];
        }else{
            $find->update($data);
            $response = [
                "success"=>true,
                "message"=>"Person identified and updated"
            ];
        }
        
        
        return $response;
    }

    
}
