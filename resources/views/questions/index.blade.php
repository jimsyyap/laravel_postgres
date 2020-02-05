@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">New Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('inc.showquestions')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
