<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{

	protected $fillable = ['rating', 'comment', 'book_id'];

    public function book()
    {
    	return $this->belongsTo('App\Book');
    }
}
