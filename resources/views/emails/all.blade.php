@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Emails</h1>

            {!! Html::link('emails/create', 'Add an Email', ['class' => 'button radius']) !!}

            @if (Auth::user()->isAdmin())
                <dl class="sub-nav">
                    <dt>Filter:</dt>
                    <dd><a href="{{ action('EmailsController@index') }}">Yours</a></dd>
                    <dd class="active"><a href="{{ action('EmailsController@all') }}">All</a></dd>
                </dl>
            @endif

            <table>
                <thead>
                <tr>
                    <th>Email Name</th>
                    <th width="20%">Owner</th>
                    <th width="20%">Last Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emails as $message)
                    <tr>
                        <td><a href="{{ action('EmailsController@show', [$message->id]) }}">{{ $message->title }}</a></td>
                        <td>{{ $message->user->name }}</td>
                        <td>{{ $message->updated_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection