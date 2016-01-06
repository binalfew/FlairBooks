<?php

use FlairBooks\Book;
use FlairBooks\Author;
use FlairBooks\Edition;
use FlairBooks\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
	use DatabaseTransactions;

	public function createBook($quantity = 1, $overrides = [])
	{
		return factory(Book::class, $quantity)->create($overrides);
	}

	public function createCategory($quantity = 1, $overrides = [])
	{
		return factory(Category::class, $quantity)->create($overrides);
	}

	public function createAuthor($quantity = 1, $overrides = [])
	{
		return factory(Author::class, $quantity)->create($overrides);
	}

	public function createEdition($quantity = 1, $overrides = [])
	{
		return factory(Edition::class, $quantity)->make($overrides);
	}	

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
		$book = $this->createBook();
		$category = $this->createCategory();

		$book->addCategories([$category->id]);

		$this->assertEquals(1, $book->countCategories());
	}

	/** @test */
	function a_book_can_join_multiple_categories_at_once()
	{
		$book = $this->createBook();
		$categories = $this->createCategory(2);

		$book->addCategories($categories->pluck('id')->all());

		$this->assertEquals(2, $book->countCategories());
	}

	/** @test */
	function a_book_can_leave_a_category()
	{
		$book = $this->createBook();
		$categories = $this->createCategory(2);

		$book->addCategories($categories->pluck('id')->all());
		$book->removeCategories([$categories[0]->id]);

		$this->assertEquals(1, $book->countCategories());
	}

	/** @test */
	function a_book_can_leave_some_categories()
	{
		$book = $this->createBook();
		$categories = $this->createCategory(3);

		$book->addCategories($categories->pluck('id')->all());
		$book->removeCategories($categories->slice(0, 2)->pluck('id')->all());

		$this->assertEquals(1, $book->countCategories());
	}

	/** @test */
	function a_book_can_leave_all_categories()
	{
		$book = $this->createBook();
		$categories = $this->createCategory(2);

		$book->addCategories($categories->pluck('id')->all());

		$book->removeCategories();

		$this->assertEquals(0, $book->countCategories());
	}

	/** @test */
	function a_book_can_be_published_by_one_author()
	{
		$book = $this->createBook();
		$author = factory(Author::class)->create();

		$book->addAuthors([$author->id]);

		$this->assertEquals(1, $book->countAuthors());
	}

	/** @test */
	function a_book_can_be_published_by_multiple_authors()
	{
		$book = $this->createBook();
		$authors = $this->createAuthor(3);

		$book->addAuthors($authors->pluck('id')->all());

		$this->assertEquals(3, $book->countAuthors());
	}

	/** @test */
	function a_book_can_remove_one_author()
	{
		$book = $this->createBook();
		$authors = $this->createAuthor(3);

		$book->addAuthors($authors->pluck('id')->all());
		$book->removeAuthors([$authors[0]->id]);

		$this->assertEquals(2, $book->countAuthors());
	}

	/** @test */
	function a_book_can_remove_all_authors()
	{
		$book = $this->createBook();
		$authors = $this->createAuthor(3);

		$book->addAuthors($authors->pluck('id')->all());
		$book->removeAuthors($authors->pluck('id')->all());

		$this->assertEquals(0, $book->countAuthors());
	}

	/** @test */
	function a_book_can_add_one_edition()
	{
		$book = $this->createBook();
		$edition = $this->createEdition();

		$book->addEdition($edition);

		$this->assertEquals(1, $book->countEditions());
	}

	/** @test */
	function a_book_can_add_multiple_editions_at_once()
	{
		$book = $this->createBook();
		$editions = $this->createEdition(3);

		$book->addEdition($editions);

		$this->assertEquals(3, $book->countEditions());
	}
}