<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Model;

class MansionImage extends Model
{
    protected $table = 'mansion_images';

    protected $fillable = [
        'mansion_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function updateMansionImage()

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
