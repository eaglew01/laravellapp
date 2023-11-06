@extends('layouts.app')

@section('content')
    <h1>Create FAQ</h1>

    {!! Form::open(['route' => 'faqs.store', 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('question', 'Question') !!}
        {!! Form::text('question', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('answer', 'Answer') !!}
        {!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
