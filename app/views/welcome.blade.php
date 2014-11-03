@extends('_master')

@section('title')
	Welcome
@stop

@section('head')
	<link rel='stylesheet' href='/css/hello-world.css' type='text/css'>
@stop

@section('content')
	<h1>Welcome to Foobooks!</h1>
	Hello {{ $user['name'] }}!
@stop

@section('footer')
	<script src="/js/hello-world.js"></script>
@stop
