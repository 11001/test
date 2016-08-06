@extends('layout.master')



@section('content')

    <div id="app-container"></div>


    <script id="createBook" type="text/html">
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('author', 'Author:') !!}
            {!! Form::text('author', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('year', 'Year:') !!}
            {!! Form::text('year', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('genre', 'Genre:') !!}
            {!! Form::text('genre', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </script>


    <script id="createUser" type="text/html">
        <div class="form-group">
            {!! Form::label('firstname', 'Firstname:') !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Lastname:') !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </script>

    <script id="editBook" type="text/html">
        <div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input class="form-control" name="title" type="text" id="title" value="<%=title %>">
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input class="form-control" name="author" type="text" id="author" value="<%=author %>">
            </div>

            <div class="form-group">
                <label for="year">Year:</label>
                <input class="form-control" name="year" type="text" id="year" value="<%=year %>">
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <input class="form-control" name="genre" type="text" id="genre" value="<%=genre %>">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </div>
    </script>

    <script id="editUser" type="text/html">
        <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input class="form-control" name="firstname" type="text" id="firstname" value="<%=firstname %>">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input class="form-control" name="lastname" type="text" id="lastname" value="<%=lastname %>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input class="form-control" name="email" type="text" id="email" value="<%=email %>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Update">
            </div>

    </script>


    <script id="createUser" type="text/html">
        <div class="form-group">
            {!! Form::label('firstname', 'Firstname:') !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Lastname:') !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    </script>

    <script id="itemBookView" type="text/html">
        <%=id %>   <%=title %> <%=genre %> <%=year %> <%=author %>
        <button class="btn btn-danger delete">Delete</button>
        <a href="/#book/create">Add</a>
        <a href="/#book/edit" class="edit">Edit</a>
    </script>

    <script id="itemUserView" type="text/html">
        <%=id %>   <%=firstname %> <%=lastname %> <%=email %>
        <button class="btn btn-danger delete">Delete</button>
        <a href="/#user/create">Add</a>
        <a href="/#user/edit" class="edit">Edit</a>
    </script>

    <script data-main="/js/main" src="/js/libs/require.js"></script>

@stop
