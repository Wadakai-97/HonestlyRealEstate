<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Model;

class SimilarMansion extends Model
{
    protected $table = 'mansions';
    protected $fillable = [
        'access_count'
        'created_at',
        'updated_at',
    ];

    public function mansion() {
        return $this->belongsTo('Mansion', 'mansion_id', 'id');
    }
}
