<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'image',
        'content',
        'staff_id',
        'created_at',
        'updated_at',
    ];

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Blog;
            $post->fill([
                'content' => $request->content,
                'staff_id' => $request->staff_id,
                'title' => $request->title,
            ]);
            $post->save();

            if(!empty($request->images)) {
                $path = $request->file('images')->storeAs('storage/blog_images', $post->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $post->images = $file_name;
                $post->save();
            }
        });
    }
    public function updateBlog($id, $request) {
        DB::transaction(function() use($id, $request) {
            $blog = Blog::find($id);
            $blog->fill([
                'content' => $request->content,
                'staff_id' => $request->staff_id,
                'title' => $request->title,
            ]);
            $blog->update();

            if(!empty($request->images)) {
                $path = $request->file('blog_image')->storeAs('storage/blog_images', $blog->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $blog->head_shot = $file_name;
                $blog->update();
            }
        });
        return;
    }
    public function staff() {
        return $this->belongsTo(Staff::class);
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
            dd($created);
            $query->where('created_at', '=', $created);
        }
    }
}
