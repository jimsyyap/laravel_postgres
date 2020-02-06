
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>
                                        {{ $question -> votes }} 
                                    </strong>
                                    <small>{{ str_plural('vote', $question -> votes) }}</small>
                                </div>
                                <div class="status {{ $question -> status }}">
                                    <strong class='px-1'>
                                        {{ $question -> answers_count }} 
                                    </strong>
                                    <small>{{ str_plural('answer', $question -> answers_count) }}</small>
                                </div>
                                <div class="view">
                                    {{ $question -> views . " " . str_plural('view', $question -> views) }}
                                </div>
                            </div>
