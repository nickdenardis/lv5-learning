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
        {!! Form::submit($submitButtonText, ['class' => 'button radius']) !!}
    </div>
</div>