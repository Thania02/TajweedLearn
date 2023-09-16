<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class learnTajwidModel extends Model
{
    use HasFactory;
    protected $table = 'learn_tajwid';
    protected $fillable = ['id', 'title', 'type_learn', 'description', 'sound'];

    public function learnTajwidDetail()
    {
        return $this->hasMany(learnTajwidDetailModel::class, 'id ', 'learn_tajwid_id');
    }
}
