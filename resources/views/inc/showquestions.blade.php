
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="media-body">
                                <h3>
                                    <a href="{{ $question -> url }}">
                                        {{-- found in models --}}
                                        {{ $question -> title }}
                                    </a>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{ $question -> user -> url }}">
                                            {{ $question -> user -> name }}
                                        </a>
                                        <small class="text-muted">
                                            {{ $question -> created_date }}
                                                {{-- created_date found in questions model --}}
                                        </small>
                                    </p>
                                </h3>
                                {{ str_limit($question->body, 250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    <div class="pagination justify-content-center">
                        {{ $questions->links() }}
                            {{-- will not show if less than one page --}}
                    </div>
