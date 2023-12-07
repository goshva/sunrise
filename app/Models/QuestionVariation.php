<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class QuestionVariation extends Model
{
    use HasFactory;
    protected $fillable = ['question_id', 'text', 'is_true'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
