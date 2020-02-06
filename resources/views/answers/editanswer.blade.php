{{-- edit answers --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Editing answer for 
                            <strong>
                                {{ $question -> title }}
                            </strong>
                        </h3>
                    </div>
                    <hr>
                    <form action="{{ route('questions.answers.update', [$question -> id, $answer -> id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <textarea id="" class="form-control {{ $errors -> has('body') ? 'is-invalid' : '' }}" name="body" rows="7">
                                {{ old('body', $answer -> body) }}
                            </textarea>
                            @if($errors -> has('body'))
                                <div class="invalid-feedback">
                                    <strong>
                                        {{ $errors -> first('body') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-outline-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
