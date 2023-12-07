<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competetion;

class CommonTest extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'competetion_id', 'created_type'];

    public function competetionTests(){
        return $this->hasMany(CompetetionTest::class);
    }
public function competetion(){
        return $this->belongsTo(Competetion::class);
    }
    
    public function tests(){
        return $this->hasMany(Test::class);
    }
    public function positions(){
        return  $this->hasManyThrough(Position::class, Competetion::class);
    }

    public function indicators(){
        return $this->hasManyThrough(Indicator::class, Competetion::class);
    }
}
