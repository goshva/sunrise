<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competetion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function positions(){
        return  $this->belongsToMany(Position::class);
    }

    public function indicators(){
        return $this->hasMany(Indicator::class);
    }

    public function literatures(){
        return $this->hasMany(Literature::class);
    }

    public function tests(){
        return $this->hasMany(Test::class);
    }

public function userTests(){
        return $this->hasMany(UserTests::class);
    }
    public function levels(){
        return $this->hasMany(CompetetionLevel::class);
    }
}
