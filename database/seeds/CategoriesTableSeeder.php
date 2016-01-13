<?php

use FlairBooks\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$textbooks = [
			['name' =>  'Accounting'],
			['name' =>  'Agriculture'],
			['name' =>  'Anthropology'],
			['name' =>  'Architecture'],
			['name' =>  'Art History'],
			['name' =>  'Astronomy'],
			['name' =>  'Biology'],
			['name' =>  'Business Management'],
			['name' =>  'Calculus'],
			['name' =>  'Chemistry'],
			['name' =>  'Computer Science'],
			['name' =>  'Criminal Justice'],
			['name' =>  'Economics'],
			['name' =>  'Education'],
			['name' =>  'Engineering'],
			['name' =>  'Finance'],
			['name' =>  'Geography'],
			['name' =>  'Literature'],
			['name' =>  'Marketing'],
			['name' =>  'Mathematics'],
			['name' =>  'Nursing'],
			['name' =>  'Philosophy'],
			['name' =>  'Physics'],
			['name' =>  'Programming'],
			['name' =>  'Psychology'],
			['name' =>  'Sociology'],
			['name' =>  'Statistics'],
			['name' =>  'Theater'],
			['name' =>  'Web Design']
		];

		$books = [
			['name' =>  'Art'],
			['name' =>  'Audiobooks'],
			['name' =>  'Bibles'],
			['name' =>  'Biography'],
			['name' =>  'Business & Finance'],
			['name' =>  'Career & Professional'],
			['name' =>  'Children\'s Books'],
			['name' =>  'Comics'],
			['name' =>  'Computer'],
			['name' =>  'Cookbooks'],
			['name' =>  'Dictionary'],
			['name' =>  'Drama'],
			['name' =>  'Encyclopedia'],
			['name' =>  'Erotica'],
			['name' =>  'Family & Relationship'],
			['name' =>  'Fantasy'],
			['name' =>  'Fiction'],
			['name' =>  'Graphic Novels'],
			['name' =>  'Health & Fitness'],
			['name' =>  'History'],
			['name' =>  'Horror'],
			['name' =>  'Humor'],
			['name' =>  'Maps'],
			['name' =>  'Math'],
			['name' =>  'Memoirs'],
			['name' =>  'Mystery'],
			['name' =>  'Poetry'],
			['name' =>  'Religion'],
			['name' =>  'Romance'],
			['name' =>  'Science'],
			['name' =>  'Science Fiction'],
			['name' =>  'Self Help'],
			['name' =>  'Sports & Recreation'],
			['name' =>  'Travel'],
		];

        $textBook = Category::create(['name' => 'Textbooks']);
        $textBook->save();
        foreach ($textbooks as $t) {
        	$childTextBook = Category::create(['name' => $t['name'] ]);
        	$childTextBook->makeChildOf($textBook);
        }

        $book = Category::create(['name' => 'Books']);
        foreach ($books as $b) {
        	$childBook = Category::create(['name' => $b['name'] ]);
        	$childBook->makeChildOf($book);
        }
    }
}
