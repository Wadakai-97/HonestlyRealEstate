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

    public function update() {
        DB::transaction(function() use($id, $request) {
            $ex_blog = Blog::find($id);
            $ex_blog->title = $request->title;
            $ex_blog->images = $request->images;
            $ex_blog->content = $request->content;
            $ex_blog->staff_id = $request->staff_id;
            $ex_blog->update();
        });
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
