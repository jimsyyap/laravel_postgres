@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Edit Question</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </div>
                </div>

                {{-- update delete buttons --}}
                <div class="card-body">
                    <form method="POST" action="{{ route('questions.update', $question->id) }}">
                        @method('PUT')
                            {{-- or {{ method_field('PUT') }} --}}
                        @include('questions.form')
                    </form>
                    <div class="d-flex align-items-center">

                        <form class="form-delete">
                            <button class="btn btn-outline-primary" type="submit">
                                Update Question
                            </button>
                        </form>
                        <p>&nbsp;</p>
                        @can('delete', $question)
                            <form class="form-delete ml-auto" method="POST" action="{{ route('questions.destroy', $question->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
