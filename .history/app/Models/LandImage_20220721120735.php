<?php

namespace App\Models;

use App\Models\Land;
use Illuminate\Database\Eloquent\Model;

class LandImage extends Model
{
    protected $table = 'land_images';

    protected $fillable = [
        'land_id',
        'path',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function land() {
        return $this->belongsTo(Land::class);
    }
}
