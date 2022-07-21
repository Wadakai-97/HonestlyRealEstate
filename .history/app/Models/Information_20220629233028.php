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
            $news = Information::find($id);
            $news->fill([
            ])title = $request->title;
            $news->body = $request->body;
            $request->images = $request->images;
            $news->update();
        });
    }
}
