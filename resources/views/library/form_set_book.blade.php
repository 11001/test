
@extends('layout.master')

@section('content-header')
    Add book
@stop

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Year</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($user->books as $book)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $book->title !!}</td>
                    <td>{!! $book->year !!}</td>
                    <td>{!! $book->author !!}</td>
                    <td>{!! $book->genre !!}</td>
                    <td>
                        {!! Form::open(['files' => true, 'method' => 'POST', 'route' => ['library.detach_book', $book->id, $user->id]]) !!}
                        {!! Form::submit('Detach', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}</td>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {!! Form::open(['files' => true, 'id' => 'attach-user-form']) !!}

    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <div class="form-group">
            {!! Form::label('user_id', 'Books') !!}
            <select name="attached_book" >
                @foreach($books as $book)
                    <option value="{{ $book->id }}">
                        {!! $book->title . ' by ' . $book->author !!}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
    <script>
        {
            let $submitForm = $('#attach-user-form');
            $submitForm.on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: '/attach_book/' + $('[name="attached_book"] :selected').val() +'/user/' + '{!! $user->id  !!}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (data) {
                        location.reload();
                    },
                    error: function () {
                    }
                });
            });
        }

    </script>
@stop
