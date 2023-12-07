<?php

namespace App\Imports;

use App\Mail\PasswordMail;
use App\Models\Objects;
use App\Models\Role;
use App\Models\Message;
use App\Models\Conversation;
use App\Models\Position;
use App\Models\Location;
use App\Models\Subdivision;
use App\Models\SubdivisionUser;
use App\Models\User;
use App\Models\UserObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Str;


class UserFirstSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        $all_users = User::all();
        $new_users = [];
        for($i=1;$i<count($collection);$i++){
            if($collection[$i][1] != null && $collection[$i][1] !== "\n") {
                $object = Objects::where('name', 'like', '%' . (string) $collection[$i][1] . '%')->first();
                if(!$object){
                     if(mb_strlen($collection[$i][1]) > 1 && $collection[$i][1] != "" ){
                    $object =Objects::create([
                        "name"=>$collection[$i][1]
                    ]);
                     }
                }
            

            if($collection[$i][2] != null) {
                $subdivision1 = Subdivision::where('name', 'like', '%' . (string) $collection[$i][2] . '%')->first();
                if(!$subdivision1) {
                     if(mb_strlen($collection[$i][2]) > 1 && $collection[$i][2] != "" ){
                  $subdivision1 = Subdivision::create([
                         "name"=> (string) $collection[$i][2],
                         "object_id" =>$object->id
                  ]);  
                     }
                }
            }
            
          if($collection[$i][3] != null) {
                $subdivision2 = Subdivision::where('name', 'like', '%' . (string) $collection[$i][3] . '%')->first();
                if(!$subdivision2) {
                    if(mb_strlen($collection[$i][3]) > 1 && $collection[$i][3] != "" ){
                         $subdivision2 = Subdivision::create([
                         "name"=> (string) $collection[$i][3],
                         "object_id" =>$object->id
                  ]); 
                    }
                  
                }
            }
            if($collection[$i][4] != null) {
                $subdivision3 = Subdivision::where('name', 'like', '%' . (string) $collection[$i][4] . '%')->first();
                if(!$subdivision3) {
                     if(mb_strlen($collection[$i][4]) > 1 && $collection[$i][4] != "" ){
                  $subdivision3 = Subdivision::create([
                         "name"=> (string) $collection[$i][4],
                         "object_id" =>$object->id
                  ]);  
                     }
                }
            }
            if($collection[$i][5] != null) {
                $subdivision4 = Subdivision::where('name', 'like', '%' . (string) $collection[$i][5] . '%')->first();
                if(!$subdivision4) {
                     if(mb_strlen($collection[$i][5]) > 1 && $collection[$i][5] != "" ){
                  $subdivision4 = Subdivision::create([
                         "name"=> (string) $collection[$i][5],
                         "object_id" =>$object->id
                  ]);  
                     }
                }
            }
              if($collection[$i][6] != null) {
                $position = Position::where('name', 'like', '%' . (string) $collection[$i][6] . '%')->first();
                if(!$position) {
                  $position = Position::create([
                         "name"=> (string) $collection[$i][6],
                  ]);  
                }
            }  
            if($collection[$i][13] != null) {
                $role = Role::where('name', 'like', '%'. (string)$collection[$i][13] . '%')->first();
                if(!$role) {
                     $role = Role::create([
                        'name' => (string)$collection[$i][13]
                     ]);
                }
            }
           
           
if($collection[$i][11] != null) {
    $location = Location::where("name", "like", '%' . (string)$collection[$i][11] . '%');
    if(!$location) {
        $location = Location::create([
            'name' => (string)$collection[$i][11]
        ]);
    }
}
            if($collection[$i][12] != null){
                $user = User::where('email','like', '%' . $collection[$i][12] . '%')->first();
                // dump($collection[$i][12]);
                if(!$user) { 
                    // dd($collection[$i][12]);
                    //  $pass = Str::password(12);
                     $avatar_names = mb_substr((string)$collection[$i][9] ,0,1) . mb_substr( (string)$collection[$i][8] ,0,1);
                    $avatar = 'https://ui-avatars.com/api/?name='.$avatar_names . '&background=104772&color=fff&size=50';
                    $user = User::create([
                        "email" => $collection[$i][12],
                        "password" => (string)"1212",
                        "first_name" => (string)$collection[$i][9],
                        "last_name" => (string)$collection[$i][8],
                        "fathers_name" => (string)$collection[$i][10],
                        "role_id" => $role->id,
                        "position_id" =>$position->id,
                        "location" => (string)$collection[$i][11],
                        "avatar" => $avatar,
                        "admin_user_id"=> null
                    ]);
                    $user->password = "1212";
                    $user->save();
                    $new_users[]=$user->id;
                    //  dd($pass);
                    $tech_conversation = Conversation::create([
                "sender_id"=>14,
                "receiver_id"=>$user->id,
                "last_time_message"=>0
            ]);
            $quest_conversation = Conversation::create([
                "sender_id"=>15,
                "receiver_id"=>$user->id,
                "last_time_message"=>0
            ]);
            $message_tech = "Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с техническими данными";
            $message_quest = "Приветсвуем в нашей платформе ! Здесь можете задать любые вопросы , связанные с вопросами о сайте";
            Message::create([
                "sender_id"=>14,
                "receiver_id"=>$user->id,
                "body"=>$message_tech,
                "read"=>0,
                "type"=>"text",
                "conversation_id"=>$tech_conversation->id
            ]);
            Message::create([
                "sender_id"=>15,
                "receiver_id"=>$user->id,
                "body"=>$message_quest,
                "read"=>0,
                "type"=>"text",
                "conversation_id"=>$quest_conversation->id
            ]);
                }
                
             
                if($object){
                    $user_object = UserObject::where("user_id",$user->id)->where("object_id",$object->id)->first();
                    if(!$user_object){
                        UserObject::create([
                        "user_id"=>$user->id,
                        "object_id"=>$object->id
                    ]);
                    }
                   
                }
                
                if($subdivision1){
                    $user_subdivision1 = SubdivisionUser::where("user_id",$user->id)->where("subdivision_id",$subdivision1->id)->first();
                    if(!$user_subdivision1){
                        SubdivisionUser::create([
                        "subdivision_id"=>$subdivision1->id,
                        "user_id"=>$user->id
                    ]);
                    }
                    
                }
                if($subdivision2){
                    $user_subdivision2 = SubdivisionUser::where("user_id",$user->id)->where("subdivision_id",$subdivision2->id)->first();
                    if(!$user_subdivision2){
                        SubdivisionUser::create([
                        "subdivision_id"=>$subdivision2->id,
                        "user_id"=>$user->id
                    ]);
                    }
                    
                }
                if($subdivision3){
                    $user_subdivision3 = SubdivisionUser::where("user_id",$user->id)->where("subdivision_id",$subdivision3->id)->first();
                    if(!$user_subdivision3){
                        SubdivisionUser::create([
                        "subdivision_id"=>$subdivision3->id,
                        "user_id"=>$user->id
                    ]);
                    }
                    
                }
                if($subdivision4){
                    $user_subdivision4 = SubdivisionUser::where("user_id",$user->id)->where("subdivision_id",$subdivision4->id)->first();
                    if(!$user_subdivision4){
                        SubdivisionUser::create([
                        "subdivision_id"=>$subdivision4->id,
                        "user_id"=>$user->id
                    ]);
                    }
                    
                }
                session(["user_id"=>$user->id]);
            }elseif($collection[$i][0] == null && $collection[$i][4] != null){
                if($object){
                    $user_object = UserObject::where("user_id",session("user_id"))->where("object_id",$object->id)->first();
                    if(!$user_object){
                        UserObject::create([
                        "user_id"=>session("user_id"),
                        "object_id"=>$collection[$i][4]
                    ]);
                    }
                   
                }
                
                if($subdivision){
                    $user_subdivision = SubdivisionUser::where("user_id",session("user_id"))->where("subdivision_id",$subdivision->id)->first();
                    if(!$user_subdivision){
                        SubdivisionUser::create([
                        "subdivision_id"=>$subdivision->id,
                        "user_id"=>session("user_id")
                    ]);
                    }
                    
                }
            }
        }
    }
}
}
