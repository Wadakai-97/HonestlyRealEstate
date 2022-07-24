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
    ];

    public function land() {
        return $this->belongsTo(Land::class);
    }
}
