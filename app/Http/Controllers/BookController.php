<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Display the list of books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', ['books' => $books]);
        
    }

    /**
     * Show the form for adding a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book;
        return view('book.create', ['book' => $book]);
    }

    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|max:1024',
            'image' => 'required|image',
            'src_file' => 'required|mimes:pdf|max:10000',
        ]);

        // save image & pdf file & get the paths
        $image_path = $request->image->store('images', 'public');
        $src_file_path = $request->src_file->store('src_files','public');

        $book = $request->all();
        $book['image'] = $image_path;
        $book['src_file'] = $src_file_path;

        Book::create($book);
        $message = 'Book added successfully.';
        Session::flash('message', $message);
        return redirect('/books');
    }

    /**
     * Display specific book.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.view', ['book' => $book]);
    }

    /**
     * Read book on browser
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function read(Book $book)
    {
        $filepath = public_path().'/storage/'.$book->src_file;
        return response()->file($filepath);
    }

    /**
     * Download book
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function download(Book $book)
    {
        $filepath = public_path().'/storage/'.$book->src_file;
        $filename = $book->title.'.pdf';
        $headers = ['Content-Type: application/pdf'];

        return response()->download($filepath, $filename, $headers);
    }

    /**
     * Increase number of downloads by 1
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     * */
    public function updateDownloads(Book $book)
    {
        $book->number_of_downloads++;
        $book->save();

        return response()->json([
            'status' => 'ok',
            'totalDownloads' => $book->number_of_downloads
        ]);
    }

}
