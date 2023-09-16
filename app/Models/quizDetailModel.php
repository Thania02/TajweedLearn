<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quizDetailModel extends Model
{
    use HasFactory;
    protected $table = 'quiz_detail';
    protected $fillable = ['id', 'quiz_id', 'answer_code', 'answer'];

    public function quiz()
    {
        return $this->belongsTo(quizModel::class, 'quiz_id', 'id');
    }
}
