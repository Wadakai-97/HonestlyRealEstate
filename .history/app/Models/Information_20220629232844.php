<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';

    protected $fillable = [
        'title',
        'body',
        'images',
        'created_at',
        'updated_at',
    ];

    public function signUp() {
        DB::transaction(function() use($request) {
            $requests = $request->only(['title', 'body', 'images']);
            Information::create($requests);
        });
        return
    }
}
