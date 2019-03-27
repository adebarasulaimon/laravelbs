@extends('layouts.app')

@section('title','Books')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Average Rating</th>
                <th>Date Created</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td class="table-text">
                            <div>{{ $book->id }}</div>
                        </td>
                        <td class="table-text">
                            <div><a href="{{ url('books/'.$book->id) }}">{{ $book->title }}</a></div>
                        </td>
                        <td class="table-text">
                            <div>{{ $book->description }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $book->getAverageRating() }}</div>
                        </td>
                        <td>
                            <div>{{ date('F d, Y H:i', strtotime($book->date_created)) }}</div>
                        </td>
                        <td>
                            <a href="{{ url('books/'.$book->id) }}" class="btn btn-default"><i
                                        class="fa fa-btn fa-book"></i>View</a>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection