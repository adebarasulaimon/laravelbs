<?php

namespace App\Http\Controllers;

use App\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookReviewController extends Controller
{
    /**
     * Store a book review in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rating' => 'required|between:1,5',
            'comment' => 'required|max:255',
        ]);
        BookReview::create($request->all());
        Session::flash('message', 'Review added successfully');
        return redirect('/books/'.$request->book_id);
    }
}
