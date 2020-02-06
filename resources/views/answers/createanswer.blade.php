{{-- show answers --}}
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h3>Your Answer</h3>
            </div>
            <hr>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <textarea id="" class="form-control" name="body" cols="30" rows="7">
                    </textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
