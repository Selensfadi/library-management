<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','book_id','price','ordered_at','status','emailed'];
public function user(){ return $this->belongsTo(\App\Models\User::class); }
public function book(){ return $this->belongsTo(\App\Models\Book::class); }

    //
}
