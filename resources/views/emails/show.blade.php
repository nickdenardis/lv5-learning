@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $email->title }}</h1>

            {{ $email->body }}
        </div>
    </div>
@endsection