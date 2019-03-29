@extends('layouts.master')

@section('content')
<div class="card">
	<h5 class="card-header">
		Edit Book
	</h5>
	<div class="card-body">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form method="post" action="{{ route('books.update', $book->id) }}">
			<div class="form-group">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PATCH">
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="name" id="name" value="{{ Input::old('name', $book->name) }}">
			</div>
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<input type="text" class="form-control" name="isbn" id="isbn" value="{{ Input::old('isbn', $book->isbn) }}">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="text" class="form-control" name="price" id="price" value="{{ Input::old('price', $book->price) }}">
			</div>
			<button type="submit" class="btn btn-primary">Update Book</button>
		</form>
	</div>
</div>
@stop
