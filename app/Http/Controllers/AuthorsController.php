<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Author;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Facades\Search;
use FlairBooks\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    public function getAuthors($search = null)
    {
        $authorsCls = 'active';
        $authors = Author::paginate(20);

        return view('admin.authors.list', compact(['authors', 'authorsCls']));
    }

    public function searchAuthors(Request $request)
    {
        $authorsCls = 'active';
        $authors = Search::authors($request->get('search'));
        
        return view('admin.authors.list', compact(['authors', 'authorsCls']));
    }

    public function createAuthor()
    {
        $authorsCls = 'active';

        return view('admin.authors.create', compact(['authorsCls']));
    }

    public function saveAuthor(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255'
        ]);

        Author::create($request->all());

        flash()->success('Created', 'Author has been created');

        return redirect('/admin/authors');
    }

    public function editAuthor($id)
    {
        $authorsCls = 'active';
        $author = Author::findOrFail($id);

        return view('admin.authors.edit', compact([
            'author',
            'authorsCls'
        ]));
    }

    public function updateAuthor(Request $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        flash()->success('Updated', 'Author has been updated');

        return redirect('/admin/authors');
    }

    public function deleteAuthor($id)
    {
        $author = Author::findOrFail($id);

        $author->delete();

        return redirect('/admin/authors');
    }
}
