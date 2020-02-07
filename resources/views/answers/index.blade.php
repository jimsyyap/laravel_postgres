        {{-- show answers --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $answersCount . " " . str_plural('Answer', $answersCount) }}</h2>
                    </div>
                    <hr>
                    @include('layouts.messages')
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

                                {{-- best answer --}}
                                @can('accept', $answer)
                                    <a title="Click to select as best answer, click again to undo" class="{{ $answer -> status }}" href="" onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer -> id }}').submit();">
                                        <i class="fas fa-check fa-2x"></i>
                                        <span class="favorites-count">
                                            123
                                        </span>
                                    </a>
                                    <form 
                                        id="accept-answer-{{ $answer -> id }}" 
                                        action="{{ route('answers.accept', $answer -> id) }}" 
                                        method="POST" style="display:none">
                                        @csrf
                                    </form>
                                @else
                                    @if ($answer -> is_best)
                                        <a title="This answer selected as best" class="{{ $answer -> status }}" href="">
                                            <i class="fas fa-check fa-2x"></i>
                                        </a>
                                    @endif
                                @endcan
                            </div>

                            {{-- list answers --}}
                            <div class="media-body">
                                {!! $answer -> body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                        {{-- edit button --}}
                                        @can('update', $answer)
                                                <a href="{{ route('questions.answers.edit', [$question -> id, $answer -> id]) }}">
                                                    Edit
                                                </a>
                                        @endcan

                                    </div>
                                    <div class="col-4">
                                        {{-- delete button --}}
                                        @can('delete', $answer)
                                            <form class="form-delete ml-auto" method="POST" action="{{ route('questions.answers.destroy', [$question -> id, $answer -> id]) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                    <div class="col-4">
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
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
