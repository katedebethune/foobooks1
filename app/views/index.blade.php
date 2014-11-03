@extends('_master')

@section('title')
	<h1>Welcome to my test Laravel site: Foobooks</h2>
@stop

@section('head')
	
@stop

@section('content')
	<!-- <h1>Hello World!</h1>
	<p>Hi {{ $name }}! Welcome to my app!</p>
	<p>Looking for the package test page? <a href="/package-test">Here it is.</a></p> -->
	
	<!--
	<form method='GET' action='/list'>
		<label for='query'>Search:</label>
		<input type='text' name='query' id='query'>
		<input type='submit' value='Search'>
	</form> -->


	{{ Form::open(array('url' => '/list', 'method' => 'GET')) }}
	
		{{ Form::label('query', 'Search'); }}
		
		{{ Form::text('query'); }}
		
		{{ Form::submit('Search'); }}
		
	{{ Form::close(); }}
		
		
@stop


