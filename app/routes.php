<?php

/*
|--------------------------------------------------------------------------
| Application Routes - foobooks
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
#39.52
# Homepage
Route::get('/', function() {
	$name = 'Douglas';
	return View::make('index')
		->with('name', $name);
}); 

Route::get('/form_test', function() 
{
	return View::make('form');
});


Route::get('/list/{format?}', function($format = 'html') {

	$query = Input::get('query');

	$library = new Library();
	$library->setPath(app_path().'/database/books.json');
	$books = $library->getBooks();
	
	if($query) {
        $books = $library->search($query);
    }

	if($format == 'json' ) {
		return 'JSON Version';
	}
	elseif($format == 'pdf' ) {
		return 'PDF Version';
	}
	else {
		return View::make('list')
			->with('name', 'Kate')
			->with('lastname', 'Bassoon')
			->with('books', $books)
			->with('query', $query);
	}
	
});



Route::get('/rabbits', function() {

	return View::make('rabbits');
});

// Display the form for a new book
Route::get('/add', function() {


});

// Process form for a new book
Route::post('/add', function() {

});

// Display the form to edit a book
Route::get('/edit/{title}', function($title) {
	
});

// Process form for editing a book
Route::post('/edit/', function() {

});
// Practice route for opening books.json file
Route::get('/data', function() {

	$library = new Library();

	$library->setPath(app_path().'/database/books.json');

	$books = $library->getBooks();
	//return "Get the contents of books.json ...";
	//use laravel implementtion
	//echo app_path();
	//echo public_path();
	//echo base_path(); 
	//echo data_path();
	
	//get file
	//$books = File::get(app_path().'/database/books.json');
	//put contents of json file into an array
	//$books = json_decode($books,true);
	//get bac first book
	//$first_book = array_pop($books);
	//return $first_book;
	//return $books as an array
	echo Pre::render($books);
	//return $books;

});

// Routes for testing & practicing with packages
Route::get('package-test', function() 
{
	$faker = Faker::create();
	echo $faker->name.'<br><br>';
	
	$generator = new Lorem();
	$paragraphs = $generator->getParagraphs(1);
	echo "And here is one paragraphs of lorem ipsum text:<br><br>";
	echo implode('<p>', $paragraphs).'<br><br>';
	
	$client = new ColorExtract;
	$image = $client->loadPng('../public/images/foobooks.png');
	$palette = $image->extract();
	echo "Here is the most used color in foobooks.png ";
	foreach($palette as $color) {
		echo($color)."<br>";
	}
});

//Testing /bootstrap/environment.php 
Route::get('/get-environment', function() {

	echo "Environment: ".App::environment();
});

//Trigger an error to see how debugging is being handled
Route::get('/trigger-error', function() {
	
	# Class Foobar should not exist, so this should error out
	$foo = new Foobar;

});


Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/practice-creating', function() {

	#Instantiate new Book model class
	$book = new Book();

	# Set
	$book->title = 'The Great Gatsby';
	$book->author = 'F. Scott Fitzgerald';
	$book->published = 1925;
	$book->cover = 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG';
    $book->purchase_link = 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565';
	$book->page_count = 320;

	$book->save();

	return 'A new book has been added! Check your database to see . . .';
});

Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $books = Book::all();

    # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
    foreach($books as $book) {
        echo $book->title.'<br>';
    }

});

/* lecture 9, pt 2, 11:17 */
Route::get('/practice-reading-one-book', function() {

    $book = Book::where('author', 'LIKE', '%Scott%')->first();
    //$book = Book::where('author', 'LIKE', '%Scott%')->get();
    //$book = Book::where('author', 'LIKE', '%Scott%')
    //->orWhere('author', 'LIKE', '%Maya')->get();

    if($book) {
        return $book->title;
    }
    else {
        return 'Book not found.';
    }

});

Route::get('/practice-updating', function() {

    # First get a book to update
    $book = Book::where('author', 'LIKE', '%Scott%')->first();

    # If we found the book, update it
    if($book) {

        # Give it a different title
        $book->title = 'The Really Really Great Gatsby';

        # Save the changes
        $book->save();

        return "Update complete; check the database to see if your update worked...";
    }
    else {
        return "Book not found, can't update.";
    }

});

Route::get('/practice-deleting', function() {

    # First get a book to delete
    $book = Book::where('author', 'LIKE', '%Scott%')->first();

    # If we found the book, delete it
    if($book) {

        # Goodbye!
        $book->delete();

        return "Deletion complete; check the database to see if it worked...";

    }
    else {
        return "Can't delete - Book not found.";
    }

});

Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});

Route::get('/test', function() {
	# Returns an object of books
		//1.27 ms
		/*
		$books = DB::table('books')->get();
		
		foreach ($books as $book) {
			echo $book->author,"<br>";
		} */
		
		
		//850 ms
		/*
		$books = DB::table('books')->where('author', 'LIKE', '%SCOTT%')->get();
		
		foreach ($books as $book) {
			echo $book->title;
		} */
		
		
		//1.15 ms
		//raw sql
		$sql = 'SELECT * FROM books WHERE author LIKE "%Scott%"';
		//escape statement
		$sql = DB::raw($sql);
		//run query
		$books = DB::select($sql);
		//output
		echo Pre::render($books, '');	
		
});




?>
