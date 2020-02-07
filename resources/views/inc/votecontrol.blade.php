{{-- vote controls --}}
<div class="d-flex flex-column vote-controls">
    <a title="User researched before posting this question" class="vote-up" href="">
        <i class="fas fa-caret-up fa-4x"></i>
    </a>
    <span class="votes-count fa-3x">
        424
    </span>
    <a title="This question is not useful" class="vote-down off" href="">
        <i class="fas fa-caret-down fa-4x mb-3"></i>
    </a>
    <a title="Click to select as GREAT question, click again to undo" 
        class="favorite {{ Auth::guest() ? 'off' : ($question -> is_favorited ? 'favorited' : '') }}" 
        onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $question -> id }}').submit();">
        <i class="fas fa-star fa-2x"></i>
        <span class="favorites-count">
            {{ $question -> favorites_count }}
        </span>
    </a>
    <form id="favorite-question-{{ $question -> id }}" 
          action="{{ route('questions.favorite', $question -> id) }}"
        {{-- action="/questions/{{ $question -> id }}/favorites"  --}}
        method="POST" 
        style="display:none">
        @csrf
        @if($question -> is_favorited)
            @method('DELETE')
        @endif
    </form>
</div>
<div class="media-body">
    {!! $question -> body_html !!}
    <div class="float-right">
        {{-- user details --}}
        <span class="text-muted">
            Posted {{ $question -> created_date }}
        </span>
        <div class="media mt-2">
            <a href="{{ $question -> user -> url }}" class="pr-2">
                <img src="{{ $question -> user -> avatar }}" alt="">
            </a>
            <div class="media-body mt-1">
                <a href="{{ $question -> user -> url }}">
                    {{ $question -> user -> name }}
                </a>
            </div>
        </div>
    </div>
</div>
