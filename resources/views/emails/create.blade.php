@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>New Email</h1>

            {!! Form::open(['action' => 'EmailsController@store']) !!}
            @include('emails.form', ['submitButtonText' => 'Add Article'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection