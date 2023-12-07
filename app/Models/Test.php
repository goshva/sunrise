<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function questions(){
        return $this->hasMany(TestQuestion::class);
    }

    public function indicator(){
        return $this->belongsTo(Indicator::class);
    }

    public function competetion(){
        return $this->belongsTo(Competetion::class);
    }
    public function competetionTest(){
        return $this->belongsTo(CompetetionTest::class);
    }
    public function commonTest(){
        return $this->belongsTo(CommonTest::class);
    }
}
