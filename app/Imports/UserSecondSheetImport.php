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


class UserSecondSheetImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        try {
        for($i=1;$i<count($collection);$i++){
            if($collection[$i][0] != null && $collection[$i][0] !== "\n") {
                $supervisor_full_name = $collection[$i][0];
                $separated_supervisor_name = explode(" ", $supervisor_full_name);
                $supervisor_first_name = trim($separated_supervisor_name[1], "\n");
                $supervisor_last_name = trim($separated_supervisor_name[0], "\n");
                $supervisor_fathers_name = trim($separated_supervisor_name[2], "\n");
                $supervisor = User::where('first_name', 'like', '%' . $supervisor_first_name . '%')->where('last_name', 'like', '%' . $supervisor_last_name . '%')->where('fathers_name', 'like', '%' . $supervisor_fathers_name . '%')->first();
                
            if($collection[$i][1] != null) {
                $subordinate_full_name = $collection[$i][1];
                $separated_subordinate_name = explode(" ", $subordinate_full_name);
                $subordinate_first_name = trim($separated_subordinate_name[1], "\n");
                $subordinate_last_name = trim($separated_subordinate_name[0], "\n");
                $subordinate_fathers_name = trim($separated_subordinate_name[2], "\n");
                $subordinate = User::where('first_name', 'like', '%' . $subordinate_first_name . '%')->where('last_name', 'like', '%' . $subordinate_last_name . '%')->where('fathers_name', 'like', '%' . $subordinate_fathers_name . '%')->first();
            $subordinate['admin_user_id'] = $supervisor->id;    
              $subordinate->save();
            //   dd($subordinate);
             }     
              }
}
} catch (\Throwable $th) {
            dd($th);
        }
    }
}
