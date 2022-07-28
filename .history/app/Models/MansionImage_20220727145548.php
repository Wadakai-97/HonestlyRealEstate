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

    public function mansionImageSignUp($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $mansion = Mansion::find($id)->get();
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();
            $image_counter = $mansion_images->count();

            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $image_counter++;
                    $extension = $request->file('image' . $i)->guessExtension();
                    $file_name = "No{$mansion->id}_{$image_counter}.{$extension}";
                    $request->file('image' . $i)->storeAs('/storage/mansion_images', $file_name);
                    $mansion_image = new MansionImage;

                    $mansion_image->fill([
                        'mansion_id' => $mansion->id,
                        'image_id' => $image_counter,
                        'category' => $request->input('category' . $i),
                        'comment' => $request->input('comment' . $i),
                        'path' => $file_name,
                    ]);
                    $mansion_image->save();
                }
            }
        });
    }

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
