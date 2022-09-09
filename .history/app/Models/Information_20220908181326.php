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
            $news = new Information;
            $news->fill([
                'title' => $request->title,
                'content' => $request->content
            ]);
            $news->save();

            if(!empty($request->images)) {
                $path = $request->file('image')->storeAs('storage/news_images', $news->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $news->images = $file_name;
                $news->save();
            }
        });
        return;
    }
    public function updateNews($id, $request) {
        DB::transaction(function() use($id, $request) {
            $news = Information::find($id);
            $news->fill([
                'title',
                'content'
            ]);
            $news->sabve();

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
        $title = $request->title ?? '';
        if(!empty($title)) {
            $query->where('title', 'like',  '%' . addcslashes($title, '%_\\') . '%');
        }
    }
    public function scopeWhereContent($query, $request) {
        $content = $request->content ?? '';
        if(!empty($content)) {
            $query->where('content', 'like',  '%' . addcslashes($content, '%_\\') . '%');
        }
    }
    public function scopeWhereStaffId($query, $request) {
        $staff_id = $request->staff;
        if(!empty($staff_id)) {
            $query->where('staff_id', '=', (int)$staff_id);
        }
    }
    public function scopeWhereCreated($query, $request) {
        $created = $request->created;
        if(!empty($created)) {
            $query->where('created_at', '>', $created);
        }
    }
}
