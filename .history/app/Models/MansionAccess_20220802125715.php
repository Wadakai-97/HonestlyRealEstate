<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Model;

class MansionAccess extends Model
{
    protected $table = 'mansion_accesss';
    protected $guarded = ['id'];
    protected $fillable = [
        'ip',
        'mansion_id',
        'created_at',
        'updated_at',
    ];
    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
