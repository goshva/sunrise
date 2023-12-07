<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestQuestion;
use App\Models\QuestionVariation;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'type', 'indicator_id', 'points'];
    public function testQuestion()
    {
        return $this->belongsTo(TestQuestion::class);
    }
    public function questionVariations()
    {
        return $this->hasMany(QuestionVariation::class);
    }
    
    public function indicator(){
        return $this->belongsTo(Indicator::class);
    }
}
