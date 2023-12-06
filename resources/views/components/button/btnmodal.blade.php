<a href="#{{ $url ?? '' }}" class="btn btn-sm btn-outline-{{ $class ?? '' }}" data-bs-toggle="modal">
    <i class="{{ $icons ?? '' }}"></i>
    @isset($span)
        <span>{{ $span }}</span>
    @endisset
</a>
