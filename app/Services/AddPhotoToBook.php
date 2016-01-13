<?php

namespace FlairBooks\Services;

use FlairBooks\Book;
use FlairBooks\Photo;
use FlairBooks\Services\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToBook {
	protected $book;
	protected $file;
	protected $thumbnail;

	public function __construct(Book $book, UploadedFile $file, Thumbnail $thumbnail = null)
	{
		$this->book = $book;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?? new Thumbnail;
	}

	public function save()
	{
		$photo = $this->book->addPhoto($this->makePhoto());

		$this->file->move($photo->baseDir(), $photo->name);

		$this->thumbnail->make($photo->path, $photo->thumbnail_path);
	}

	public function makePhoto()
	{
		return new Photo(['name' => $this->makeFileName()]);
	}

	public function makeFileName()
	{
		$name = sha1(time() . $this->file->getClientOriginalName());
        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
	}
}