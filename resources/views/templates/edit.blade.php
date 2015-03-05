@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Edit Template</h1>

            {!! Form::model($template, ['action' => ['TemplatesController@update', $template->id], 'method' => 'PATCH']) !!}
            @include('templates.form', ['submitButtonText' => 'Update Template'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection