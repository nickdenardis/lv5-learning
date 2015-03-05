@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $template->name }}</h1>

            <iframe src="/templates/{{ $template->id }}/preview" width="700" height="1400" ></iframe>

            <p>{!! Html::link('templates/' . $template->id . '/edit', 'Edit Template', ['class' => 'button radius small']) !!}</p>
        </div>
    </div>
@endsection