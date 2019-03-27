<div class="form-group">
    {!! Form::label('title', 'Title') !!}
	{!! Form::text('title', '', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description') !!}
	{!! Form::text('description', '', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Book Image') !!}
	{!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('src_file', 'File (.pdf)') !!}
    {!! Form::file('src_file', null, ['class' => 'form-control']) !!}
</div>

<button class="btn btn-success" type="submit">Add book</button>
