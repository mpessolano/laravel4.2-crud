<?php

class BookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Book::all();

		return View::make('books.index', compact('books'));
		//return View::make('books.index')->with('books', $books);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('books.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'  => 'required|max:255',
			'isbn'  => 'required|alpha_num',
			'price' => 'required|numeric', 
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::to('books/create')->withErrors($validator)->withInput(Input::all());
		}

		// $book = Book::create([
		// 	'name'  => Input::get('name'),
		// 	'isbn'  => Input::get('isbn'),
		// 	'price' => Input::get('price')
		// ]);

		// $book = Book::create(Input::all());

		$book = new Book;
		$book->name  = Input::get('name');
		$book->isbn  = Input::get('isbn');
		$book->price = Input::get('price');
		$book->save();

		// Session::flash('success', 'Book is successfully saved');
		return Redirect::to('books')->with('success', 'Book is successfully saved');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::findOrFail($id);

		return View::make('books.edit', compact('book'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'  => 'required|max:255',
			'isbn'  => 'required|alpha_num',
			'price' => 'required|numeric',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) 
		{
			return Redirect::to('books/'.$id.'/edit')->withErrors($validator)->withInput(Input::all());
		}

		// Book::whereId($id)->update([
		// 	'name'  => Input::get('name'),
		// 	'isbn'  => Input::get('isbn'),
		// 	'price' => Input::get('price')
		// ]);

		$book = Book::find($id);
		$book->name  = Input::get('name');
		$book->isbn  = Input::get('isbn');
		$book->price = Input::get('price');
		$book->save();

		//Session::flash('success', 'Book is successfully updated');
		return Redirect::to('books')->with('success', 'Book is successfully updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = Book::findOrFail($id);
		$book->delete();

		return Redirect::to('books')->with('success', 'Book is successfully deleted');
	}


}
