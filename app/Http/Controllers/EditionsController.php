<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use FlairBooks\Edition;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Http\Controllers\Controller;

class EditionsController extends Controller
{
    public function getEditions($bookId)
    {
    	$booksCls = 'active';
    	$editions = Edition::whereBookId($bookId)->paginate(20);

    	return view('admin.editions.list', compact([
    		'editions',
    		'bookId',
    		'booksCls'
		]));
    }

    public function showEdition($id)
    {
        $booksCls = 'active';
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact([
            'book',
            'booksCls'
        ]));
    }

    public function createEdition($bookId)
    {
        $booksCls = 'active';
        $edition = new Edition;

        return view('admin.editions.create', compact('edition', 'bookId', 'booksCls'));
    }

    public function saveEdition(Request $request, $bookId)
    {
        $this->validate($request, [
            'publisher' => 'required|max:255',
            'published_at'  => 'required|date',
            'version'   => 'required',
            'pages' => 'required',
            'price' => 'required'
        ]);

        $book = Book::findOrFail($bookId);
        $edition = new Edition($request->all());
        $book->addEdition($edition);
        
        flash()->success('Created', 'New book edition has been created');

        return redirect("/admin/books/$bookId/editions");
    }

    public function editEdition($bookId, $editionId)
    {
        $booksCls = 'active';
        $edition = Edition::findOrFail($editionId);

        return view('admin.editions.edit', compact([
            'edition',
            'bookId',
            'booksCls'
        ]));
    }

    public function updateEdition(Request $request, $bookId, $editionId)
    {
        $edition = Edition::findOrFail($editionId);
        $edition->update($request->all());
        
        flash()->success('Updated', 'Edition has been updated');

        return redirect("/admin/books/$bookId/editions");
    }

    public function deleteEdition($bookId, $editionId)
    {
        $edition = Edition::findOrFail($editionId); 
        $edition->delete();

        return redirect("/admin/books/$bookId/editions");
    }
}