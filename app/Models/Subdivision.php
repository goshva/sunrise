<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function positions(){
        return $this->hasMany(Position::class);
    }

    public function object() {
        return $this->belongsTo(Objects::class);
    }

    public function users(){
        return $this->belongsToMany(User::class,'subdivision_users',"subdivision_id");
    }
}
