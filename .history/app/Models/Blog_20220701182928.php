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
        'images',
        'content',
        'staff_id',
        'created_at',
        'updated_at',
    ];

    public function signUp($request) {
        DB::transaction(function() use($id, $request) {
            $post = new Blog;
            $post->fill([
                'content' => $request->content,
                'staff_id' => $request->staff_id,
                'title' => $request->title,
            ]);
            $post->sa();

            if(!empty($request->images)) {
                $path = $request->file('post->sa->storeAs('storage/blog_image', $blog->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $blog->head_shot = $file_name;
                $blog->update();
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
                $path = $request->file('blog_image')->storeAs('storage/blog_image', $blog->id.'.'.$request->images->extension());
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
}
