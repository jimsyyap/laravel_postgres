
                            <div class="d-flex flex-column counters">
                                <div class="vote">
                                    <strong>
                                        {{ $question -> votes }} 
                                    </strong>
                                    <small>{{ str_plural('vote', $question -> votes) }}</small>
                                </div>
                                <div class="status {{ $question -> status }}">
                                    <strong class='px-1'>
                                        {{ $question -> answers }} 
                                    </strong>
                                    <small>{{ str_plural('answer', $question -> answers) }}</small>
                                </div>
                                <div class="view">
                                    {{ $question -> views . " " . str_plural('view', $question -> views) }}
                                </div>
                            </div>
