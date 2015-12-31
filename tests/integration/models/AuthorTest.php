<?php

use FlairBooks\Book;
use FlairBooks\Author;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthorTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	function an_author_has_name()
	{
		$author = factory(Author::class)->create(['first_name' => 'Binalfew', 'last_name' => 'Kassa']);

		$this->assertEquals('Binalfew', $author->first_name);
		$this->assertEquals('Kassa', $author->last_name);
	}

	/** @test */
	function an_author_can_publish_a_book()
	{
		$author = factory(Author::class)->create();
		$bookOne = factory(Book::class)->create();
		$bookTwo = factory(Book::class)->create();

		$author->publish($bookOne);
		$author->publish($bookTwo);

		$this->assertEquals(2, $author->count());
	}

	/** @test */
	function an_author_can_publish_many_books_at_once()
	{
		$author = factory(Author::class)->create();
		$books = factory(Book::class, 2)->create();

		$author->publish($books);

		$this->assertEquals(2, $author->count());
	}

	/** @test */
	function an_author_can_remove_a_book()
	{
		$author = factory(Author::class)->create();
		$books = factory(Book::class, 2)->create();

		$author->publish($books);

		$author->remove($books[0]);

		$this->assertEquals(1, $author->count());
	}

	/** @test */
	function an_author_can_remove_some_books_at_once()
	{
		$author = factory(Author::class)->create();
		$books = factory(Book::class, 3)->create();

		$author->publish($books);

		$author->remove($books->slice(0, 2));

		$this->assertEquals(1, $author->count());
	}

	/** @test */
	function an_author_can_remove_all_books_at_once()
	{
		$author = factory(Author::class)->create();
		$books = factory(Book::class, 2)->create();

		$author->publish($books);

		$author->abandon($books);

		$this->assertEquals(0, $author->count());
	}
}