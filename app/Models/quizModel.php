<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizModel extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $fillable = ['id', 'file', 'question', 'quiz_type', 'answer_benar'];

    public function quizDetail()
    {
        return $this->hasMany(quizDetailModel::class, 'quiz_id', 'id');
    }
}
