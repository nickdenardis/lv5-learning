@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>{{ $email->title }}</h1>

            @unless($email->tags->isEmpty())
                <ul>
                    @foreach($email->tags as $tag)
                        <li class="label">{{ $tag->name }}</li>
                    @endforeach
                </ul>
            @endunless

            <iframe src="/emails/{{ $email->id }}/preview" width="700" height="900" ></iframe>

            <p>{!! Html::link('emails/' . $email->id . '/edit', 'Edit Email', ['class' => 'button radius small']) !!}</p>
        </div>
    </div>
@endsection