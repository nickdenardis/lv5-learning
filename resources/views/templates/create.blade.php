@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>New Template</h1>

            @foreach($errors as $error)
                {{$error}}
            @endforeach

            {!! Form::open(['action' => 'TemplatesController@store']) !!}
            @include('templates.form', ['submitButtonText' => 'Add Template'])

            {!! Form::close() !!}
        </div>
    </div>
@endsection