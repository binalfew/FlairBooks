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
     		['code' => 'accounting', 'name' =>  'Accounting'],
			['code' => 'agriculture', 'name' =>  'Agriculture'],
			['code' => 'anthropology', 'name' =>  'Anthropology'],
			['code' => 'architecture', 'name' =>  'Architecture'],
			['code' => 'arthistory', 'name' =>  'Art History'],
			['code' => 'astronomy', 'name' =>  'Astronomy'],
			['code' => 'biology', 'name' =>  'Biology'],
			['code' => 'businessmanagement', 'name' =>  'Business Management'],
			['code' => 'calculus', 'name' =>  'Calculus'],
			['code' => 'chemistry', 'name' =>  'Chemistry'],
			['code' => 'computerscience', 'name' =>  'Computer Science'],
			['code' => 'criminaljustice', 'name' =>  'Criminal Justice'],
			['code' => 'economics', 'name' =>  'Economics'],
			['code' => 'education', 'name' =>  'Education'],
			['code' => 'engineering', 'name' =>  'Engineering'],
			['code' => 'finance', 'name' =>  'Finance'],
			['code' => 'geography', 'name' =>  'Geography'],
			['code' => 'literature', 'name' =>  'Literature'],
			['code' => 'marketing', 'name' =>  'Marketing'],
			['code' => 'mathematics', 'name' =>  'Mathematics'],
			['code' => 'nursing', 'name' =>  'Nursing'],
			['code' => 'philosophy', 'name' =>  'Philosophy'],
			['code' => 'physics', 'name' =>  'Physics'],
			['code' => 'programming', 'name' =>  'Programming'],
			['code' => 'psychology', 'name' =>  'Psychology'],
			['code' => 'religion', 'name' =>  'Religion'],
			['code' => 'sociology', 'name' =>  'Sociology'],
			['code' => 'statistics', 'name' =>  'Statistics'],
			['code' => 'theater', 'name' =>  'Theater'],
			['code' => 'webdesign', 'name' =>  'Web Design'],
        ];

        $books = [
        	['code' => 'architecture', 'name' =>  'Architecture'],
			['code' => 'art', 'name' =>  'Art'],
			['code' => 'audiobooks', 'name' =>  'Audiobooks'],
			['code' => 'bibles', 'name' =>  'Bibles'],
			['code' => 'biography', 'name' =>  'Biography'],
			['code' => 'businessandfinance', 'name' =>  'Business & Finance'],
			['code' => 'careerandprofessional', 'name' =>  'Career & Professional'],
			['code' => 'childrensbooks', 'name' =>  'Children\'s Books'],
			['code' => 'comics', 'name' =>  'Comics'],
			['code' => 'computer', 'name' =>  'Computer'],
			['code' => 'cookbooks', 'name' =>  'Cookbooks'],
			['code' => 'dictionary', 'name' =>  'Dictionary'],
			['code' => 'drama', 'name' =>  'Drama'],
			['code' => 'encyclopedia', 'name' =>  'Encyclopedia'],
			['code' => 'erotica', 'name' =>  'Erotica'],
			['code' => 'familyandrelationship', 'name' =>  'Family & Relationship'],
			['code' => 'fantasy', 'name' =>  'Fantasy'],
			['code' => 'fiction', 'name' =>  'Fiction'],
			['code' => 'graphicnovels', 'name' =>  'Graphic Novels'],
			['code' => 'healthandfitness', 'name' =>  'Health & Fitness'],
			['code' => 'history', 'name' =>  'History'],
			['code' => 'horror', 'name' =>  'Horror'],
			['code' => 'humor', 'name' =>  'Humor'],
			['code' => 'maps', 'name' =>  'Maps'],
			['code' => 'math', 'name' =>  'Math'],
			['code' => 'memoirs', 'name' =>  'Memoirs'],
			['code' => 'mystery', 'name' =>  'Mystery'],
			['code' => 'poetry', 'name' =>  'Poetry'],
			['code' => 'religion', 'name' =>  'Religion'],
			['code' => 'romance', 'name' =>  'Romance'],
			['code' => 'science', 'name' =>  'Science'],
			['code' => 'sciencefiction', 'name' =>  'Science Fiction'],
			['code' => 'selfhelp', 'name' =>  'Self Help'],
			['code' => 'sportsandrecreation', 'name' =>  'Sports & Recreation'],
			['code' => 'travel', 'name' =>  'Travel'],
        ];

        $textBook = Category::create([
        	'code' => 'textbooks',
        	'name' => 'Textbooks'
    	]);
        $textBook->save();

        foreach ($textbooks as $t) {
        	$childTextBook = Category::create([
        		'code' => $t['code'],
        		'name' => $t['name']
    		]);
        	$childTextBook->makeChildOf($textBook);
        }

        $book = Category::create([
        	'code' => 'books',
        	'name' => 'Books'
    	]);
        
        foreach ($books as $b) {
        	$childBook = Category::create([
        		'code' => $b['code'],
        		'name' => $b['name']
    		]);
        	$childBook->makeChildOf($book);
        }
    }
}
