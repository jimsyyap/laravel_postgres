@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('inc.breadcrumbs')
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question -> title }}</h1>
                            {{-- <div class="ml-auto"> --}}
                                {{-- <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back</a> --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="User did some research before posting this question" class="vote-up" href="">
                                <i class="fas fa-caret-up fa-4x"></i>
                                {{-- color me green --}}
                            </a>
                            <span class="votes-count fa-3x">
                                424
                            </span>
                            <a title="This question is not useful" class="vote-down off" href="">
                                <i class="fas fa-caret-down fa-4x mb-3"></i>
                            </a>
                            <a title="Click to select as GREAT question, click again to undo" class="favorite favorited" href="">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">
                                    123
                                </span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question -> body_html !!}
                            <div class="float-right">
                                {{-- user details --}}
                                <span class="text-muted">
                                    Posted {{ $question -> created_date }}
                                </span>
                                <div class="media mt-2">
                                    <a href="{{ $question -> user -> url }}" class="pr-2">
                                        <img src="{{ $question -> user -> avatar }}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question -> user -> url }}">
                                            {{ $question -> user -> name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- show answers --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question -> answers_count . " " . str_plural('Answer', $question -> answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach($question -> answers as $answer)
                        <div class="media">
                            {{-- vote controls --}}
                            <div class="d-flex flex-column vote-controls">
                                <a title="This answer was useful" class="vote-up" href="">
                                    <i class="fas fa-caret-up fa-4x"></i>
                                    {{-- color me green --}}
                                </a>
                                <span class="votes-count fa-3x">
                                    424
                                </span>
                                <a title="This answer was not useful" class="vote-down off" href="">
                                    <i class="fas fa-caret-down fa-4x mb-3"></i>
                                </a>
                                <a title="Click to select as best answer, click again to undo" class="vote-accepted" href="">
                                    <i class="fas fa-check fa-2x"></i>
                                    <span class="favorites-count">
                                        123
                                    </span>
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $answer -> body_html !!}
                                <div class="float-right">
                                    {{-- user details --}}
                                    <span class="text-muted">
                                        Answered {{ $answer -> created_date }}
                                    </span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer -> user -> url }}" class="pr-2">
                                            <img src="{{ $answer -> user -> avatar }}" alt="">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer -> user -> url }}">
                                                {{ $answer -> user -> name }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
