@if(isset($book))
    {!! Form::model($book, ['method' => 'PUT', 'files' => true, 'route' => ['book.update', $book->id]]) !!}
@else
    {!! Form::open(['files' => true, 'route' => 'book.store']) !!}
@endif

<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', \Input::old('title'), ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
    {!! Form::label('author', 'Author:') !!}
    {!! Form::text('author', \Input::old('author'), ['class' => 'form-control']) !!}
    {!! $errors->first('author', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::text('year', \Input::old('year'), ['class' => 'form-control']) !!}
    {!! $errors->first('year', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('genre') ? 'has-error' : ''}}">
    {!! Form::label('genre', 'Genre:') !!}
    {!! Form::text('genre', \Input::old('genre'), ['class' => 'form-control']) !!}
    {!! $errors->first('genre', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($book) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}



