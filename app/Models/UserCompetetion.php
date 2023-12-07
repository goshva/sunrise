<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompetetion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function competetion(){
        return $this->belongsTo(Competetion::class);
    }
    public function competetionTest(){
        return $this->belongsTo(CompetetionTest::class);
    }
 public function commonTest(){ 
        return $this->belongsTo(CommonTest::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tests(){
        return $this->hasManyThrough(Test::class, Competetion::class);
    }
}
