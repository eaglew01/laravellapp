@extends('layouts.app')

@section('content')
    <h1>{{ $faq->question }}</h1>
    <p>{{ $faq->answer }}</p>
    <a href="{{ route('faqs.edit', $faq->id) }}">Edit FAQ</a>
</div>
@endsection
