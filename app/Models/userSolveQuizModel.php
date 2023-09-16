<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userSolveQuizModel extends Model
{
    use HasFactory;
    protected $table = 'user_solve_quiz';
    protected $fillable = ['id', 'user_id', 'quiz_id', 'task_code', 'answer', 'status', 'date'];

    public function quiz()
    {
        return $this->hasOne(quizModel::class, 'id', 'quiz_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
