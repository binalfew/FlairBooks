<?php

use FlairBooks\Book;
use FlairBooks\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	function a_book_has_title_and_description()
	{
		$book = new Book(['title' => 'PHP', 'description' => 'Programming']);

		$this->assertEquals('PHP', $book->title);
		$this->assertEquals('Programming', $book->description);
	}

	/** @test */
	function a_book_can_join_a_category()
	{
		$book = factory(Book::class)->create();
		$categoryOne = factory(Category::class)->create();
		$categoryTwo = factory(Category::class)->create();

		$book->join($categoryOne);
		$book->join($categoryTwo);

		$this->assertEquals(2, $book->count());
	}

	/** @test */
	function a_book_can_join_multiple_categories_at_once()
	{
		$book = factory(Book::class)->create();
		$categories = factory(Category::class, 2)->create();

		$book->join($categories);

		$this->assertEquals(2, $book->count());
	}

	/** @test */
	function a_book_can_leave_a_category()
	{
		$book = factory(Book::class)->create();
		$categories = factory(Category::class, 2)->create();

		$book->join($categories);

		$book->leave($categories[0]);

		$this->assertEquals(1, $book->count());
	}

	/** @test */
	function a_book_can_leave_some_categories()
	{
		$book = factory(Book::class)->create();
		$categories = factory(Category::class, 3)->create();

		$book->join($categories);

		$book->leave($categories->slice(0, 2));

		$this->assertEquals(1, $book->count());
	}

	/** @test */
	function a_book_can_leave_all_categories()
	{
		$book = factory(Book::class)->create();
		$categories = factory(Category::class, 2)->create();

		$book->join($categories);

		$book->orphan();

		$this->assertEquals(0, $book->count());
	}

	/** @test */
	function a_book_can_sync_its_categories()
	{
		$book = factory(Book::class)->create();
		$categories = factory(Category::class, 3)->create();
		$category = $categories = factory(Category::class)->create();

		$book->join($categories);

		$book->sync([$category->id]);

		$this->assertEquals(1, $book->count());
	}
}