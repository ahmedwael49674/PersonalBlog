<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Category extends Model
{
  
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'title', 'image'
  ];

  /**
  * Get the companys of company.
  */
  public function posts()
  {
    return $this->hasMany('App\Post');
  }

  public function setImageAttribute($value)
  {
      $this->attributes['image'] = Storage::disk('public')->putFile('categories', $value);
  }
}
