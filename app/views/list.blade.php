@extends('_master')

@section('title')
	Books
@stop

@section('content')
	<h1>Books</h1>

	<div>
		View as:
		<a href='/list/json' target='_blank'>JSON</a> | 
		<a href='/list/pdf' target='_blank'>PDF</a>
	</div>

    
   
    {{-- @foreach($foods as $food) --}}
        {{-- $food->name.'<br>'; --}}
    
    {{-- @endforeach --}}
    
    @foreach($books as $book)
    	<section class='book'>
    		<h2>{{ $book->title }}</h2>
    		{{ $book->author }} ({{$book->published }})
    		{{-- insert tags here once tag table has been added to dbase --}}
    		<img src='{{ $book->cover }}'>
    		<br>
    		<a href='{{ $book->purchase_link }}'>Purchase...</a>
    	</section>	
    @endforeach
	
@stop








