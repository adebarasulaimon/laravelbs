@extends('layouts.app')

@section('title',$book->title)

@section('content')
    <div class="panel-body">
        <h3 class="title"> {{ $book->title }}</h3>
        <table class="table table-striped task-table">
            <thead>
            <th colspan="2">&nbsp;</th>
            </thead>
            <tbody>
            <tr>
                <td class="table-text">
                    <div><strong>ID</strong></div>
                </td>
                <td class="table-text">
                    <div id="bookId">{{ $book->id }}</div>
                </td>
            </tr>
            <td class="table-text">
                <div><strong>Image</strong></div>
            </td>
            <td class="table-text">
                <div>
                    <img src="{{ Storage::disk('local')->url($book->image) }}"
                         style="max-width:200px; max-height:200px"/>
                </div>
            </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Title</strong></div>
                </td>
                <td class="table-text">
                    <div>{{ $book->title }}</div>
                </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Description</strong></div>
                </td>
                <td class="table-text">
                    <div>{{ $book->description }}</div>
                </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Average Rating</strong></div>
                </td>
                <td class="table-text">
                    <div>{{ $book->getAverageRating() }}</div>
                </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Downloads</strong></div>
                </td>
                <td class="table-text">
                    <div id="book-downloads">{{ $book->number_of_downloads }}</div>
                </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Created</strong></div>
                </td>
                <td class="table-text">
                    <div>{{ date('F d, Y H:i', strtotime($book->date_created)) }}</div>
                </td>
            </tr>
            <tr>
                <td class="table-text">
                    <div><strong>Reviews</strong></div>
                </td>
                <td class="table-text">
                    @foreach($book->reviews as $review)
                        <div>Rating: {{ $review->rating }} Comment: {{ $review->comment }}</div>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="{{ url('books/'.$book->id.'/read') }}" class="btn btn-success" id="read-book-btn">Read</a>
                    <a href="{{ url('books/'.$book->id.'/download') }}" class="btn btn-success" id="download-book-btn">Download</a>
                    <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Review</button>
                </td>
            </tr>
            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Review</h4>
                    </div>
                    <div class="modal-body">
                        @include('bookreview.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection