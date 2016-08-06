@extends('layout.master')

@section('content-header')
    {!! trans('books.edit_user') !!}
@stop

@section('content')
    @include('users.form')
@stop
