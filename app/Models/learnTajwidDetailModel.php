<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class learnTajwidDetailModel extends Model
{
    use HasFactory;
    protected $table = 'learn_tajwid_detail';
    protected $fillable = ['id', 'learn_tajwid_id', 'example', 'letter'];

    public function learnTajwidDetail()
    {
        return $this->belongsTo(learnTajwidModel::class, 'id ', 'learn_tajwid_id');
    }
}
