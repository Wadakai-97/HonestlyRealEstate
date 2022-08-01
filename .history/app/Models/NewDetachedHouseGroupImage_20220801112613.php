<?php

namespace App\Models;

use App\Models\NewDetachedHouseGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewDetachedHouseGroupImage extends Model
{
    protected $table = 'new_detached_house_group_images';

    protected $fillable = [
        'new_detached_house_group_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function imageSignUp($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $new_detah = new_detah::find($id);
            $new_detah_images = new_detahImage::where('new_detah_id', '=', $id)->get();

            if(!is_array($new_detah_images && !empty($new_detah_images))) {
                $image_id = 1;
            } else if(is_array($new_detah_images) && !empty($new_detah_images)) {
                $id_checker = range(1, 21);
                $not_dupulicate_number = array_diff($id_checker, $new_detah_images);
                $image_id = reset($not_dupulicate_number);
            }

            if(!empty($request->file('image'))) {
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$new_detah->id}_{$image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/new_detah', $file_name);
                $new_detah_image = new new_detahImage;

                $new_detah_image->fill([¥^@
                    'new_detah_id' => $new_detah->id,
                    'image_id' => $image_id,
                    'category' => $request->category,
                    'comment' => $request->comment,
                    'path' => $file_name,
                ]);
                $new_detah_image->save();
            }
        });
    }

    public function imageUpdate($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $new_detah_image = new_detahImage::find($id);
            if(!empty($request->file('image')) && $new_detah_image->path != $request->file('image')) {
                Storage::delete('/storage/property_images/new_detah/' . $new_detah_image->path);
                $extension = $request->file('image')->guessExtension();
                $file_name = "No{$new_detah_image->new_detah_id}_{$new_detah_image->image_id}.{$extension}";
                $request->file('image')->storeAs('/storage/property_images/new_detah', $file_name);
                $new_detah_image->fill([
                    'path' => $file_name,
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            } else {
                $new_detah_image->fill([
                    'category' => $request->category,
                    'comment' => $request->comment,
                ]);
            }
            $new_detah_image->update();
        });
    }

    public function newDetachedHouse() {
        return $this->belongsTo(NewDetachedHouseGroup::class);
    }
}
