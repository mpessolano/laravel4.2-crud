@extends('layouts.master')

@section('content')
	@if (Session::has('success'))
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
	@endif

	<h1 class="mb-4">Books</h1>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Book Name</th>
				<th>ISBN</th>
				<th>Price</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($books as $book)
			<tr>
				<td>{{ $book->id }}</td>
				<td>{{ $book->name }}</td>
				<td>{{ $book->isbn }}</td>
				<td>{{ $book->price }}</td>
				<td>
					<a href="{{ route('books.show', $book->id) }}" class="btn btn-secondary btn-sm">Show</a>
					<a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
				</td>
				<td>
					<form action="{{ route('books.destroy', $book->id) }}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="DELETE">
						<button class="btn btn-danger btn-sm" type="submit">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop
