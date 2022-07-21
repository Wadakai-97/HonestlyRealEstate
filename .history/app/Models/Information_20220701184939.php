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
            $post = new Information;
            $post->fill(['title', 'body']);
            $post->save();

            if(!empty($request->images)) {
                
            }

        });
        return;
    }

    public function updateNews($id, $request) {
        DB::transaction(function() use($id, $request) {
            $news = Information::find($id);
            $news->fill([
                'title' => $request->title,
                'body' => $request->body,
                'images' => $request->images,
            ]);
            $news->update();
        });
        return;
    }
}
