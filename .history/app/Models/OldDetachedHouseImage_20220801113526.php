<?php

namespace App\Models;

use App\Models\OldDetachedHouse;
use Illuminate\Database\Eloquent\Model;

class OldDetachedHouseImage extends Model
{
    protected $table = 'old_detached_house_images';

    protected $fillable = [
        'old_detached_house_id',
        'path',
    ];

    public function imageSignUp($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $old_detached_house = NewDetachedHouse::find($id);
            $old_detached_house_images = NewDetachedHouseImage::where('old_detached_house_id', '=', $id)->get();

            if(!is_array($old_detached_house_images && !empty($old_detached_house_images))) {
                $image_id = 1;
            } else if(is_array($old_detached_house_images) && !empty($old_detached_house_images)) {
                $id_checker = range(1, 21);
                $not_dupulicate_number = array_diff($id_checker, $old_detached_house_images);
                $image_id = reset($not_dupulicate_number);
            }

            if(!empty($request->file('image'))) {
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$old_detached_house->id}_{$image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/old_detached_house', $file_name);
                $old_detached_house_image = new NewDetachedHouseImage;

                $old_detached_house_image->fill([¥^@
                    'old_detached_house_id' => $old_detached_house->id,
                    'image_id' => $image_id,
                    'category' => $request->category,
                    'comment' => $request->comment,
                    'path' => $file_name,
                ]);
                $old_detached_house_image->save();
            }
        });
    }

    public function imageUpdate($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $old_detached_house_image = NewDetachedHouseImage::find($id);
            if(!empty($request->file('image')) && $old_detached_house_image->path != $request->file('image')) {
                Storage::delete('/storage/property_images/old_detached_house/' . $old_detached_house_image->path);
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$old_detached_house_image->old_detached_house_id}_{$old_detached_house_image->image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/old_detached_house', $file_name);
                $old_detached_house_image->fill([
                    'path' => $file_name,
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            } else {
                $old_detached_house_image->fill([
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            }
            $old_detached_house_image->update();
        });
    }

    public function oldDetachedHouse() {
        return $this->belongsTo(OldDetachedHouse::class);
    }
}
