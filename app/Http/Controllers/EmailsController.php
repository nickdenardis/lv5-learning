<?php namespace Incremently\Http\Controllers;

use Incremently\Email;
use Incremently\Http\Requests;
use Incremently\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Incremently\Http\Requests\EmailRequest;

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
     * @param EmailRequest $request
     * @return Response
     */
	public function store(EmailRequest $request)
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
        $email = Email::findOrFail($id);

		return view('emails.edit', compact('email'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param EmailRequest $request
     * @return Response
     */
	public function update($id, EmailRequest $request)
	{
        $email = Email::findOrFail($id);

        $email->update($request->all());

        return redirect('emails');
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
