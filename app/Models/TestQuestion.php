<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class TestQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function variations()
    {
        return $this->hasMany(TestQuestionVariation::class);
    }
    public function file()
    {
        return $this->hasOne(TestQuestionFiles::class);
    }
    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
