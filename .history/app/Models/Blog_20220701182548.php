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
        DB::transaction(function() use($request) {
            $requests = $request->only(['title', 'images', 'content', 'staff_id']);
            Blog::create($requests);
        });
        return;
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

            if(!empty($request->head_shot)) {
                $path = $request->file('head_shot')->storeAs('storage/blog_image', $blog->id.'.'.$request->images->extension());
                $file_name = basename($path);
                $staff->head_shot = $file_name;
                $staff->update();
            }
        });
        return;
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
