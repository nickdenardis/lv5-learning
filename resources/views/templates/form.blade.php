<div class="row">
    <div class="large-12 columns">
        {!! Form::label('name', 'Name:', ['class' => ($errors->has('name')?'error':'')] ) !!}
        {!! Form::text('name', null, ['class' => ($errors->has('name')?'error':'')] ) !!}
        @if ($errors->has('name')) <small class="error">{{ $errors->first('name') }}</small> @endif
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
    <div class="large-12 colunms">
        <label>
            {!! Form::checkbox('is_active', '1', null,  ['id' => 'is_active']) !!}
            Active
        </label>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        {!! Form::submit($submitButtonText, ['class' => 'button radius']) !!}
    </div>
</div>