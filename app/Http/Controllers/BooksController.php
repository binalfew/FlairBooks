<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use FlairBooks\Photo;
use FlairBooks\Author;
use FlairBooks\Category;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Facades\Search;
use FlairBooks\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BooksController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		parent::__construct();
	}

    public function getBooks()
    {
    	$booksCls = 'active';
    	$books = Book::latest()->paginate(20);

    	return view('admin.books.list', compact(['books', 'booksCls']));
    }

    public function searchBooks(Request $request)
    {
        $booksCls = 'active';
        $books = Search::books($request->get('search'));
        
        return view('admin.books.list', compact(['books', 'booksCls']));
    }

    public function showBook($id)
    {
        $booksCls = 'active';
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact([
            'book',
            'booksCls'
        ]));
    }

    public function createBook()
    {
        $booksCls = 'active';
        $authorOptions = $this->authorOptions();
        $categoryOptions = $this->categoryOptions();

        return view('admin.books.create', compact('authorOptions', 'categoryOptions', 'booksCls'));
    }

    public function saveBook(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description'  => 'required|max:255'
        ]);

        $book = Book::create($request->all());
        $book->addAuthors($request->input('author_list'));
        $book->addCategories($request->input('category_list'));
        
        flash()->success('Created', 'Book has been created');

        return redirect('/admin/books');
    }

    public function editBook($id)
    {
        $booksCls = 'active';
        $book = Book::findOrFail($id);
        $authorOptions = $this->authorOptions();
        $categoryOptions = $this->categoryOptions();

        return view('admin.books.edit', compact([
            'book',
            'authorOptions',
            'categoryOptions',
            'booksCls'
        ]));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        $book->addAuthors($request->input('author_list'));
        $book->addCategories($request->input('category_list'));

        flash()->success('Updated', 'Book has been updated');

        return redirect('/admin/books');
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id); 
        $book->delete();

        return redirect('/admin/books');
    }

    public function categoryOptions()
    {
        $roots = Category::roots()->get();
        $options = [];
        foreach ($roots as $root) {
            $children = $root->children()->get();
            $options[$root->name] = $children->lists('name', 'id')->toArray();
        }

        return $options;
    }

    public function authorOptions()
    {
        $options['Authors'] = Author::all()->lists('full_name', 'id')->toArray();

        return $options;
    }
}