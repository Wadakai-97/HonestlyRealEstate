<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Model;

class MansionImage extends Model
{
    protected $table = 'mansion_images';

    protected $fillable = [
        'mansion_id',
        'category',
        'comment',
        'path',
        'created_at'
        ,
    ];

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
