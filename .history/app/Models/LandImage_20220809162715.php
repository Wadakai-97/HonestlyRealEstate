<?php

namespace App\Models;

use App\Models\Land;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LandImage extends Model
{
    protected $table = 'land_images';

    protected $fillable = [
        'land_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function imageSignUp($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $land = Land::find($id);
            $image_id = 1 ;

            while(LandImage::where('land_id', '=', $id)->where('image_id', '=', $image_id)->exists()) {
                $image_id++;
            }

            if(!empty($request->file('image'))) {
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$land->id}_{$image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/land', $file_name);
                $land_image = new LandImage;

                $land_image->fill([
                    'land_id' => $land->id,
                    'image_id' => $image_id,
                    'category' => $request->category,
                    'comment' => $request->comment,
                    'path' => $file_name,
                ]);
                $land_image->save();
            }
        });
    }
    public function imageUpdate($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $land_image = LandImage::find($id);
            if(!empty($request->file('image')) && $land_image->path != $request->file('image')) {
                Storage::delete('/storage/property_images/land/' . $land_image->path);
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$land_image->land_id}_{$land_image->image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/land', $file_name);
                $land_image->fill([
                    'path' => $file_name,
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            } else {
                $land_image->fill([
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            }
            $land_image->update();
        });
    }

    public function land() {
        return $this->belongsTo(Land::class);
    }
}
