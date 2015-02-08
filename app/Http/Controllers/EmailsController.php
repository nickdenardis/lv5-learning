<?php namespace Incremently\Http\Controllers;

use Incremently\Email;
use Incremently\Http\Requests;
use Incremently\Http\Controllers\Controller;

use Incremently\Http\Requests\CreateEmailRequest;

class EmailsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$emails = Email::latest('updated_at')->get();

        return view('emails.index', compact('emails'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('emails.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEmailRequest $request
     * @return Response
     */
	public function store(CreateEmailRequest $request)
    {
        Email::create($request->all());

        return redirect('emails');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $email = Email::findOrFail($id);

        return view('emails.show', compact('email'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
