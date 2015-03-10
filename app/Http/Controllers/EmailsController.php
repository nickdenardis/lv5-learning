<?php namespace Incremently\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Incremently\Email;
use Incremently\Http\Requests;
use Incremently\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Incremently\Http\Requests\EmailRequest;
use Incremently\Tag;
use Incremently\Template;
use Incremently\User;

class EmailsController extends Controller {

    /**
     * Create a new email instance
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
        $this->middleware( 'admin', ['only' => 'all'] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emails = Auth::user()->emails()->with('template')->latest( 'updated_at' )->get();

        return view( 'emails.index', compact( 'emails' ) );
    }

    /**
     * Display a list of all emails in the system
     *
     * @return \Illuminate\View\View
     */
    public function all()
    {
        $emails = Email::latest( 'updated_at' )->with('template')->get();

        return view( 'emails.all', compact( 'emails' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists( 'name', 'id' );
        $templates = Template::lists('name', 'id');

        return view( 'emails.create', compact('tags', 'templates') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmailRequest $request
     * @return Response
     */
    public function store( EmailRequest $request )
    {
        // Create the new email object with the form submission
        $email = new Email( $request->all() );

        // Save the email and return it's contents
        $email = Auth::user()->emails()->save( $email );

        // Attach all the tags submitted to this new email
        $this->syncTags( $email, (array)$request->input( 'tag_list' ) );

        // Create a message for the user
        flash()->success( 'Successfully added email!' );

        // Redirect back to the list
        return redirect( 'emails' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show( $id )
    {
        $email = Email::findOrFail( $id );

        return view( 'emails.show', compact( 'email' ) );
    }

    /**
     * Combine the email body with the template body
     *
     * @param $id
     * @return mixed
     */
    public function preview( $id )
    {
        $email = Email::findOrFail( $id );
        $template_body = $email->template->body;

        $fields = ['%TITLE%', '%CONTENT%'];
        $values = [$email->title, $email->body];

        return str_replace($fields, $values, $template_body);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit( $id )
    {
        $email = Email::findOrFail( $id );

        $tags = Tag::lists( 'name', 'id' );
        $templates = Template::lists('name', 'id');

        return view( 'emails.edit', compact( 'email', 'tags', 'templates' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param EmailRequest $request
     * @return Response
     */
    public function update( $id, EmailRequest $request )
    {
        // Find the email to edit
        $email = Email::findOrFail( $id );

        // Update based on the submitted fields
        $email->update( $request->all() );

        // Attach all the tags submitted to this new email
        $this->syncTags( $email, (array)$request->input( 'tag_list' ) );

        // Create a message for the user
        flash()->success( 'Successfully edited email!' );

        // Return the user to the list
        return redirect( 'emails' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy( $id )
    {
        //
    }

    /**
     * Sync the tags on the email
     *
     * @param Email $email
     * @param array $tags
     */
    private function syncTags( Email $email, array $tags )
    {
        // Ensure all new tags are in the database
        $tags = $this->createTags($tags);
        
        // Add and remove the tag associations
        $email->tags()->sync( $tags );
    }

    /**
     * Find or create new tags
     *
     * @param array $tags
     * @return array
     */
    private function createTags(array $tags)
    {
        $tag_ids = [];

        foreach($tags as $tag) {
            if (filter_var($tag, FILTER_VALIDATE_INT)){
                $params = ['id' => $tag];
            } else {
                $params = ['name' => $tag];
            }

            $tag = Tag::firstOrCreate($params);
            $tag_ids[] = $tag->id;
        }

        return $tag_ids;
    }
}
