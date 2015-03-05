@extends('app')

@section('content')
    <div class="row">
        <div class="large-12 columns">
            <h1>Templates</h1>

            {!! Html::link('templates/create', 'Add a Template', ['class' => 'button radius small']) !!}

            <table>
                <thead>
                <tr>
                    <th>Template Name</th>
                    <th width="20%">Active?</th>
                    <th width="20%">Created</th>
                </tr>
                </thead>
                <tbody>
                @foreach($templates as $template)
                    <tr>
                        <td><a href="{{ action('TemplatesController@show', [$template->id]) }}">{{ $template->name }}</a></td>
                        <td>{{ $template->is_active }}</td>
                        <td>{{ $template->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection