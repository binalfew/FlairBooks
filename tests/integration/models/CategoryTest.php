<?php

use FlairBooks\Book;
use FlairBooks\Category;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
	use DatabaseTransactions;

	/** @test */
	function a_category_has_a_name()
	{
		$category = new Category(['code' => '001', 'name' => 'Category One']);

		$this->assertEquals('Category One', $category->name);
	}

	/** @test */
	function a_category_can_add_a_book()
	{
		$category = factory(Category::class)->create();
		$bookOne = factory(Book::class)->create();
		$bookTwo = factory(Book::class)->create();

		$category->add($bookOne);
		$category->add($bookTwo);

		$this->assertEquals(2, $category->count());
	}

	/** @test */
	function a_category_can_add_multiple_books_at_once()
	{
		$category = factory(Category::class)->create();
		$books = factory(Book::class, 2)->create();

		$category->add($books);

		$this->assertEquals(2, $category->count());
	}

	/** @test */
	function a_category_can_remove_a_book()
	{
		$category = factory(Category::class)->create();
		$books = factory(Book::class, 2)->create();

		$category->add($books);

		$category->remove($books[0]);

		$this->assertEquals(1, $category->count());
	}

	/** @test */
	function a_category_can_remove_more_than_one_book_at_once()
	{
		$category = factory(Category::class)->create();
		$books = factory(Book::class, 3)->create();

		$category->add($books);

		$category->remove($books->slice(0, 2));

		$this->assertEquals(1, $category->count());
	}

	/** @test */
	function a_category_can_remove_all_books_at_once()
	{
		$category = factory(Category::class)->create();
		$books = factory(Book::class, 2)->create();
		
		$category->add($books);

		$category->wipeout();

		$this->assertEquals(0, $category->count());
	}
}