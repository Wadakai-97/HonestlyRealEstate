<?php

namespace App\Models;

use App\Models\Mansion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function imageSignUp($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $mansion = Mansion::find($id);
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get();

            if(!is_array($mansion_images && !empty($mansion_images))) {
                $image_id = 1;
            } else if(is_array($mansion_images) && !empty($mansion_images)) {
                $id_checker = range(1, 21);
                $not_dupulicate_number = array_diff($id_checker, $mansion_images);
                $image_id = reset($not_dupulicate_number);
            }

            if(!empty($request->file('image'))) {
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$mansion->id}_{$image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/mansion_images', $file_name);
                $mansion_image = new MansionImage;

                $mansion_image->fill([¥^@
                    'mansion_id' => $mansion->id,
                    'image_id' => $image_id,
                    'category' => $request->category,
                    'comment' => $request->comment,
                    'path' => $file_name,
                ]);
                $mansion_image->save();
            }
        });
    }

    public function imageUpdate($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $mansion_image = MansionImage::find($id);
            if(!empty($request->file('image')) && $mansion_image->path != $request->file('image')) {
                Storage::delete('/storage/mansion_images/' . $mansion_image->path);
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$mansion_image->mansion_id}_{$mansion_image->image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/mansion_images', $file_name);
                $mansion_image->fill([
                    'path' => $file_name,
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            } else {
                $mansion_image->fill([
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            }
            $mansion_image->update();
        });
    }

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
