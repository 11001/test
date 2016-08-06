@extends('layout.master')

@section('content-header')
    Add user
@stop

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($book->users as $user)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $user->firstname !!}</td>
                    <td>{!! $user->lastname !!}</td>
                    <td>{!! $user->email !!}</td>
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
            {!! Form::label('user_id', 'Users') !!}
            <select name="attached_user" >
                @foreach($users as $user)
                    <option value="{{ $user->id }}">
                        {!! $user->firstname . ' ' . $user->lastname . ' (' . $user->email . ' )' !!}
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
                    url: '/attach_book/' + {!! $book->id !!} +'/user/' + $('[name="attached_user"] :selected').val(),
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