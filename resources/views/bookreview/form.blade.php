{!! Form::model($book->review, ['action' => 'BookReviewController@store']) !!}
{!! Form::hidden('book_id', $book->id) !!}
<div class="form-group">
    {!! Form::label('rating', 'Rating (1-5)') !!}
    {!! Form::text('rating', '', ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('comment', 'Comment') !!}
    {!! Form::text('comment', '', ['class' => 'form-control']) !!}
</div>
{!! Form::submit('Add review', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}