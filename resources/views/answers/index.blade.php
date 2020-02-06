        {{-- show answers --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @foreach($answers as $answer)
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
