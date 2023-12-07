<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTests extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function testAnswers(){
        return $this->hasMany(UserTestAnswers::class);
    }

    public function test(){
        return $this->belongsTo(Test::class);
    }
    public function competetion(){
        return $this->belongsTo(Competetion::class);
    }
    public function competetionTest(){
        return $this->belongsTo(CompetetionTest::class);
    }
}
