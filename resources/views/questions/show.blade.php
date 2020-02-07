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
                        @include('inc.votecontrol')
                    </div>
                </div>
            </div>
        </div>
        @include('answers.index', [
            'answers' => $question -> answers,
            'answersCount' => $question -> answers_count,
        ])
        @include('answers.createanswer')
    </div>
</div>
@endsection
