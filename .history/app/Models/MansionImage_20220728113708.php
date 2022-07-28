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
            $mansion_images = MansionImage::where('mansion_id', '=', $id)->get('image_id');
            $id_counter = 1;
            while($mansion_images->where('image_id', '=', $id_counter)) {
                $id_counter++;
            }

            if(!empty($request->file('image'))) {
                $extension = $request->file('image' . $id_counter)->guessExtension();
                $file_name = "No{$mansion->id}_{$id_counter}.{$extension}";
                $request->file('image')->storeAs('/storage/mansion_images', $file_name);
                $mansion_image = new MansionImage;

                $mansion_image->fill([
                    'mansion_id' => $mansion->id,
                    'image_id' => $id_counter,
                    'category' => $request->category,
                    'comment' => $request->comment,
                    'path' => $file_name,
                ]);
                $mansion_image->save();
            }
        });
    }

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
