{{-- show answers --}}
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Your Answer</h3>
            </div>
            <hr>
            <form action="{{ route('questions.answers.store', $question -> id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea id="" class="form-control {{ $errors -> has('body') ? 'is-invalid' : '' }}" name="body" cols="30" rows="7">
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
                    <button class="btn btn-lg btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
