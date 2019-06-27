<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Post extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'title', 'content', 'image', 'category_id'];

  public function category()
  {
    return $this->belongsTo('App\Category');
  }

  public function setImageAttribute($value)
  {
      $this->attributes['image'] = Storage::disk('public')->putFile('posts', $value);
  }
}
