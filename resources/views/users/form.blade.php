@if(isset($user))
    {!! Form::model($user, ['method' => 'PUT', 'files' => true, 'route' => ['user.update', $user->id]]) !!}
@else
    {!! Form::open(['files' => true, 'route' => 'email.store']) !!}
@endif

<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
    {!! Form::label('firstname', 'First name:') !!}
    {!! Form::text('firstname', \Input::old('firstname'), ['class' => 'form-control']) !!}
    {!! $errors->first('firstname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
    {!! Form::label('lastname', 'Last name:') !!}
    {!! Form::text('lastname', \Input::old('lastname'), ['class' => 'form-control']) !!}
    {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', \Input::old('email'), ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::submit(isset($user) ? 'Update' : 'Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}



