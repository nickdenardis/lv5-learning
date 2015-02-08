@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>New Email</h1>

            {!! Form::open(['action' => 'EmailsController@store']) !!}
                <div class="row">
                    <div class="large-12 columns">
                        {!! Form::label('title', 'Title:') !!}
                        {!! Form::text('title') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        {!! Form::label('body', 'Body:') !!}
                        {!! Form::textarea('body') !!}
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        {!! Form::submit('Add Email', ['class="button radius"']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection