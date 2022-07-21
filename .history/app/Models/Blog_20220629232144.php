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
            $_blog = Blog::find($id);
            $_blog->title = $request->title;
            $_blog->images = $request->images;
            $_blog->content = $request->content;
            $_blog->staff_id = $request->staff_id;
            $_blog->update();
        });
    }

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
