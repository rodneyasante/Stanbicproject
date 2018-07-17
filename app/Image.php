<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image as Intervention;
use Storage;

class Image extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'location', 'thumbnail'
  ];

  /**
   * Get all of the owning imageable models.
   */
  public function imageable()
  {
    return $this->morphTo()->orderBy('id','desc');
  }

  static public function store($image,$owner){
  	$time = time();
  	$filename = 'images/'.$time.'.'.$image->getClientOriginalExtension();
  	$thumbnail = 'images/'.$time.'-thumb.'.$image->getClientOriginalExtension();
  	Intervention::make($image)->save(public_path('storage/'.$filename));
  	Intervention::make($image)->resize(null,150,function($constraint){
  		$constraint->aspectRatio();
  	})->save(public_path('storage/'.$thumbnail));

  	return $owner->images()->create([
  		'location' => $filename,
  		'thumbnail' => $thumbnail
  	]);
  }

  public function erase()
    {
        Storage::delete('public/'.$this->location);
        Storage::delete('public/'.$this->thumbnail);
		$this->delete();
    }

}
