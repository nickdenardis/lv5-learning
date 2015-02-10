<div class="row">
    <div class="large-12 columns">
        {!! Form::label('title', 'Title:', ['class' => ($errors->has('title')?'error':'')] ) !!}
        {!! Form::text('title', null, ['class' => ($errors->has('title')?'error':'')] ) !!}
        @if ($errors->has('title')) <small class="error">{{ $errors->first('title') }}</small> @endif
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        {!! Form::label('body', 'Body:', ['class' => ($errors->has('body')?'error':'')] ) !!}
        {!! Form::textarea('body', null, ['class' => ($errors->has('body')?'error':'')] ) !!}
        @if ($errors->has('body')) <small class="error">{{ $errors->first('body') }}</small> @endif
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        {!! Form::label('tag_list', 'Tags:', ['class' => ($errors->has('tag_list')?'error':'')] ) !!}
        {!! Form::select('tag_list[]', $tags, null, ['class' => ($errors->has('tag_list')?'error':''), 'multiple'] ) !!}
        @if ($errors->has('tag_list')) <small class="error">{{ $errors->first('tag_list') }}</small> @endif
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        {!! Form::submit($submitButtonText, ['class' => 'button radius']) !!}
    </div>
</div>