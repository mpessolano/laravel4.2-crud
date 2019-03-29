@extends('layouts.master')

@section('content')
	<div class="card text-center">
		<h5 class="card-header">
			Show Book
		</h5>
		<div class="card-body">
			<h5 class="card-title mb-3">
				{{ $book->name }}
			</h5>
			<p class="card-text">
				<strong>ISBN:</strong> {{ $book->isbn }}
			</p>
			<p class="card-text">
				<strong>Price:</strong> {{ $book->price }}
			</p>
			<div class="mt-4">
				<a href="{{ route('books.index') }}" class="btn btn-secondary">Go back</a>
				<a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary d-none">Edit</a>
			</div>
		</div>
	</div>
@stop