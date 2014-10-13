@extends('layouts.master')

@section('content')
    <div class="middle">
        <h1> Shorten a URL </h1>

        {{ Form::open(['url' => 'links']) }}

            <!-- Url Form Input -->
            <div class="form-group">
                {{ Form::text('url', null, ['class' => 'form-control', 'id' => 'shorten-input', 'placeholder' => 'https://laracasts.com']) }}
                {{ $errors->first('url', '<div class="error">:message</div>') }}
            </div>

        {{ Form::close() }}

        @if (Session::has('hashed'))
            <output>{{ link_to(Session::get('hashed')) }}</output>
        @endif

    </div>
@stop