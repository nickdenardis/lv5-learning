<?php namespace Incremently\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Incremently\Http\Requests;
use Incremently\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Incremently\Http\Requests\TemplateRequest;
use Incremently\Template;

class TemplatesController extends Controller {

	/**
	 * Create a new templates instance
	 */
	public function __construct()
	{
		$this->middleware( 'auth' );
		$this->middleware( 'admin' );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$templates = Template::latest( 'name' )->get();
		return view('templates.index', compact('templates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view( 'templates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param TemplateRequest $request
	 * @return Response
	 */
	public function store( TemplateRequest $request)
	{
		// Create the new template object with the form submission
		$template = new Template( $request->all() );

		// Save the email and return it's contents
		$template = Auth::user()->templates()->save( $template );

		// Create a message for the user
		flash()->success( 'Successfully added template!' );

		// Redirect back to the list
		return redirect( 'templates' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$template = Template::findOrFail( $id );

		return view( 'templates.show', compact( 'template' ) );
	}

	public function preview($id)
	{
		$template = Template::findOrFail( $id );

		return view( 'templates.preview', compact( 'template' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$template = Template::findOrFail( $id );

		return view( 'templates.edit', compact( 'template' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		// Find the template to edit
		$template = Template::findOrFail( $id );

		$request->merge([
			'is_active' => $request->exists('is_active')
		]);

		// Update based on the submitted fields
		$template->update( $request->all() );

		// Create a message for the user
		flash()->success( 'Successfully edited template!' );

		// Return the user to the list
		return redirect( 'templates' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
