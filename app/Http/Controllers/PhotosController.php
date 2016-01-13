<?php

namespace FlairBooks\Http\Controllers;

use FlairBooks\Book;
use FlairBooks\Photo;
use Illuminate\Http\Request;
use FlairBooks\Http\Requests;
use FlairBooks\Services\AddPhotoToBook;
use FlairBooks\Http\Controllers\Controller;

class PhotosController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		parent::__construct();
	}

    public function getPhotos($bookId)
    {
    	$booksCls = 'active';
    	$photos = Photo::whereBookId($bookId)->paginate(20);

    	return view('admin.photos.list', compact([
            'photos',
            'bookId',
            'booksCls'
        ]));
    }

    public function createPhoto($bookId)
    {
        $booksCls = 'active';

        return view('admin.photos.create', compact('bookId', 'booksCls'));
    }

    public function savePhoto(Request $request, $bookId)
    {
        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $book = Book::findOrFail($bookId);
        $photo = $request->file('photo');

        (new AddPhotoToBook($book, $photo))->save();
    }
}
