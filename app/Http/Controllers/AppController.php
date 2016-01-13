<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use FlairBooks\Edition;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Http\Controllers\Controller;

class AppController extends Controller
{
    public function showBookOverview($id)
    {
        $book = Book::findOrFail($id);
        $edition = $book->lastEdition();

        return view('pages.book', compact(['book', 'edition']));
    }
}
