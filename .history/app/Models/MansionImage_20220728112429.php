<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MansionImage extends Model
{
    protected $table = 'mansion_images';

    protected $fillable = [
        'mansion_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function mansionImageUpdate($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $mansion = Mansion::find($request->mansion_id);
            $mansion_image = MansionImage::where('mansion_id', '=', $mansion->id)->where('image_id', '=', $id)->get();

            if(!empty($mansion_image)) {
                $mansion_image = new MansionImage;
            }

            $mansion_image->fill([
                'mansion_id' => $mansion->id,
                'image_id' => $id,
                'category' => $request->category,
                'comment' => $request->comment,
            ]);
            $mansion_image->save();
        });
    }

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
