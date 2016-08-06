@extends('layout.master')

@section('content-header')
    Books
@stop

@section('content')
{!! $message or '' !!}
<a class="btn btn-success" href="{!! route('book.create') !!}">Create</a>
 <?php $i = 1; ?>
 <div class="table-responsive">
     <table class="table">
         <thead>
         <tr>
             <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Owners</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $book->title !!}</td>
                    <td>{!! $book->author !!}</td>
                    <td>{!! $book->year !!}</td>
                    <td>{!! $book->genre !!}</td>
                    <td>
                        @foreach ($book->users as $user)
                            {!! $user->firstname . ' ' . $user->lastname !!} <br>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{!! route('book.edit', $book->id) !!}">Edit</a>
                        <a class="btn btn-info" href="{!! route('library.attach_user', $book->id) !!}">Attach user</a>
                        {!! Form::open(['files' => true, 'method' => 'DELETE', 'route' => ['book.destroy', $book->id]]) !!}
                        {!! Form::submit('Destroy', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $books->render() !!}

@stop