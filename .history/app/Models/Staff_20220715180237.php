<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Review;
use App\Models\Information;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = [
        'staff_name',
        'head_shot',
        'position',
        'number_of_contracts',
        'birthplace',
        'hobby',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function reviews() {
        return $this->hasMany(Review::class, 'staff_id', 'id');
    }

    public function blogs() {
        return $this->hasMany(Blog::class, 'staff_id', 'id');
    }

    public function informations() {
        return $this->hasMany(Information::class, 'staff_id', 'id');
    }

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Staff;
            $post->fill([
                'staff_name' => $request->staff_name,
                'position' => $request->position,
                'number_of_contracts' => $request->number_of_contracts,
                'birthplace' => $request->birthplace,
                'hobby' => $request->hobby,
                'comment' => $request->comment,
            ]);
            $post->save();

            if(!empty($request->head_shot)) {
                $path = $request->file('head_shot')->storeAs('storage/head_shots', $post->id.'.'.$request->head_shot->extension());
                $file_name = basename($path);
                $post->head_shot = $file_name;
                $post->save();
            }
        });
        return;
    }

    public function updateStaff($id, $request) {
        DB::transaction(function() use($id, $request) {
            $staff = Staff::find($id);
            $staff->fill([
                'staff_name' => $request->staff_name,
                'position' => $request->position,
                'number_of_contracts' => $request->number_of_contracts,
                'birthplace' => $request->birthplace,
                'hobby' => $request->hobby,
                'comment' => $request->comment,
            ]);
            $staff->update();

            if(!empty($request->head_shot)) {
                $path = $request->file('head_shot')->storeAs('storage/head_shots', $staff->id.'.'.$request->head_shot->extension());
                $file_name = basename($path);
                $staff->head_shot = $file_name;
                $staff->update();
            }
        });
        return;
    }
}
