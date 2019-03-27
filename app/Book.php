<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    public $timestamps = false;
    protected $fillable = ['title', 'description', 'image', 'src_file'];

    public function reviews()
    {
        return $this->hasMany('App\BookReview', 'book_id');
    }

    public function getAverageRating()
    {
        if ($this->reviews->count() > 0) {
            $sum = 0;
            $i = 0;
            foreach ($this->reviews as $review) {
                $sum += $review->rating;
                $i++;
            }
            if ($i > 0) {
                $avg_rating = $sum / $i;
                return number_format($avg_rating, 2, ',', '.');
            }
        }

        return null;

    }
}
