@extends('layouts.app')

@section('title','Books')

@section('content')

    <div class="panel-body">
        @include('common.errors')

        {!! Form::model($book, ['action' => 'BookController@store', 'files' => true]) !!}
        @include('book.form', ['submitButtonText' => 'Add'])
        {!! Form::close() !!}
    </div>
@endsection