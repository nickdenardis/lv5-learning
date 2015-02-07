@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Emails</h1>

            <table>
                <thead>
                    <tr>
                        <th>Email Name</th>
                        <th width="20%">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($emails as $message)
                <tr>
                    <td><a href="{{ action('EmailsController@show', [$message->id]) }}">{{ $message->title }}</a></td>
                    <td>{{ $message->updated_at }}</td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection