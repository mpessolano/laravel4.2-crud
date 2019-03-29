@extends('layouts.master')

@section('content')
<div class="card">
	<h5 class="card-header">
		Add Book
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
		<form method="post" action="{{ route('books.store') }}">
			<div class="form-group">
				{{ Form::token() }}
				<label for="name">Name:</label>
				<input type="text" class="form-control" name="name" id="name" value="{{ Input::old('name') }}">
			</div>
			<div class="form-group">
				<label for="isbn">ISBN:</label>
				<input type="text" class="form-control" name="isbn" id="isbn" value="{{ Input::old('isbn') }}">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="text" class="form-control" name="price" id="price" value="{{ Input::old('price') }}">
			</div>
			<button type="submit" class="btn btn-primary">Create Book</button>
		</form>
	</div>
</div>
@stop