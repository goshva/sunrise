<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetetionTest extends Model
{
    use HasFactory;

    protected $guarded = [];
   // protected $fillable = ['common_test_id'];

    public function competetion(){
        return $this->belongsTo(Competetion::class);
    }

    public function tests(){
        return $this->hasMany(Test::class, "competetion_test_id");
    }
    public function positions(){
        return  $this->hasManyThrough(Position::class, Competetion::class);
    }

    public function indicators(){
        return $this->hasManyThrough(Indicator::class, Competetion::class);
    }
}
