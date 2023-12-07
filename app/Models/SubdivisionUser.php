<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubdivisionUser extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subdivision(){
        return $this->belongsTo(Subdivision::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
