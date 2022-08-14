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
        'image',
        'created_at',
        'updated_at',
    ];

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Information;
            $post->fill([
                'title' => $request->title,
                'body' => $request->body
            ]);
            $post->save();

            if(!empty($request->images)) {
                $path = $request->file('image')->storeAs('storage/news_images', $post->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $post->images = $file_name;
                $post->save();
            }
        });
        return;
    }
    public function updateNews($id, $request) {
        DB::transaction(function() use($id, $request) {
            $news = Information::find($id);
            $news->fill(['title', 'body']);
            $news->update();

            if(!empty($request->images)) {
                $path = $request->file('image')->storeAs('storage/news_images', $news->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $news->images = $file_name;
                $news->update();
            }
        });
        return;
    }

    // scope
    public function scopeWhereTitle($query, $request) {
        $customer_name = $request->customer_name ?? '';
        if(!empty($customer_name)) {
            $query->where('name', 'like',  '%' . addcslashes($customer_name, '%_\\') . '%');
        }
    }
    public function scopeWhere($query, $request) {
        $type = $request->type;
        if(!empty($type)) {
            $query->where('type', '=', $type);
        }
    }
}
