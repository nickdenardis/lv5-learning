@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $email->title }}</h1>

            <iframe src="/emails/{{ $email->id }}/preview" width="700" height="1400" ></iframe>

            @unless($email->tags->isEmpty())
                <ul>
                    @foreach($email->tags as $tag)
                        <li class="label">{{ $tag->name }}</li>
                    @endforeach
                </ul>
            @endunless

            <p>{!! Html::link('emails/' . $email->id . '/edit', 'Edit Email', ['class' => 'button radius']) !!}</p>
        </div>
    </div>
@endsection