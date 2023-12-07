<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\IndicatorGroup;

class Indicator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function competetions(){
        return $this->belongsTo(Competetion::class);
    }

    public function test(){
        return $this->hasOne(Test::class,"indicator_id");
    }
      public function indicatorGroup(){
        return $this->belongsTo(IndicatorGroup::class);
    }
}
