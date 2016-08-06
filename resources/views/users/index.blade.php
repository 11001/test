@extends('layout.master')

@section('content-header')
    Users
@stop

@section('content')
    {!! $message or '' !!}
    <a class="btn btn-success" href="{!! route('user.create') !!}">Create</a>
    <?php $i = 1; ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Books</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $user->firstname !!}</td>
                    <td>{!! $user->lastname  !!}</td>
                    <td>{!! $user->email  !!}</td>
                    <td>
                        @foreach ($user->books as $book)
                          {!! $book->title . ' by ' . $book->author !!} <br>
                        @endforeach
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{!! route('user.edit', $user->id) !!}">Edit</a>
                        <a class="btn btn-info" href="{!! route('library.attach_book', $user->id) !!}">Attach book</a>
                        {!! Form::open(['files' => true, 'method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                        {!! Form::submit('Destroy', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {!! $users->render() !!}

@stop