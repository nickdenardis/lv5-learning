@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Edit Email</h1>

            {!! Form::model($email, ['action' => ['EmailsController@update', $email->id], 'method' => 'PATCH']) !!}
            @include('emails.form', ['submitButtonText' => 'Update Article'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection