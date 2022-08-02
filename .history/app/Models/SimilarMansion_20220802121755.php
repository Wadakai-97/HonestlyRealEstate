<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Model;

class SimilarMansion extends Model
{
access_count

    public function mansion() {
        return $this->belongsTo('Mansion', 'mansion_id', 'id');
    }
}
