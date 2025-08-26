<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
  'title','slug','author','category_id','description',
  'release_date','price','stock','cover_path','file_path'
];
public function category(){ return $this->belongsTo(\App\Models\Category::class); }

    //
}
