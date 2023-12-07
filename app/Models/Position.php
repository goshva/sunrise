<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompetetionLevel;

class Position extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function competetions(){
      return $this->belongsToMany(Competetion::class);
    }
 public function competetionLevels(){
      return $this->belongsToMany(CompetetionLevel::class);
    }
    public function users(){
      return $this->hasMany(User::class);
    }

    public function subdivision(){
      return $this->belongsTo(Subdivision::class);
    }
}
