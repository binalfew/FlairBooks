<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use FlairBooks\Author;
use FlairBooks\Category;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Facades\Search;
use FlairBooks\Http\Controllers\Controller;

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
    	$books = Book::paginate(20);

    	return view('admin.books.list', compact(['books', 'booksCls']));
    }

    public function searchBooks(Request $request)
    {
        $booksCls = 'active';
        $books = Search::books($request->get('search'));
        
        return view('admin.books.list', compact(['books', 'booksCls']));
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
        $this->syncAuthors($book, $request);
        $this->syncCategories($book, $request);
        
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
        $this->syncAuthors($book, $request);
        $this->syncCategories($book, $request);

        flash()->success('Updated', 'Book has been updated');

        return redirect('/admin/books');
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/admin/books');
    }

    public function syncAuthors(Book $book, Request $request)
    {
        if ($author_list = $request->input('author_list')) {
            $book->syncAuthors($author_list);
        }
    }

    public function syncCategories(Book $book, Request $request)
    {
        if ($category_list = $request->input('category_list')) {
            $book->syncCategories($category_list);
        }
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