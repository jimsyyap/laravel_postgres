@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Questions</div>

                <div class="card-body">
                    @include('inc.showquestions')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection