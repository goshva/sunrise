<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Indicator;

class IndicatorGroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['name'];
    protected $fillable = ['group_name', 'name'];
    protected $table = ['indicators_group'];

    public function indicators(){
        return $this->hasMany(Indicator::class);
    }
}
