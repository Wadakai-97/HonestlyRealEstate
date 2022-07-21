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

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $requests = $request->only(['title', 'body', 'images']);
            Information::create($requests);
        });
        return;
    }

    public function update($id, $request) {
        DB::transaction(function() use($id, $request) {
            $ex_news = Information::find($id);
            $ex_news->title = $request->title;
            $ex_news->body = $request->body;
            $ex_request->images = $request->images;
            $ex_news->update();
        });
    }
}
