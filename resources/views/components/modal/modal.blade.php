<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" aria-labelledby="{{ $id ?? '' }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="{{ $class ?? '' }}" action="{{ $action ?? '' }}" method="{{ $method ?? '' }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5">{{ $title ?? '' }}</h1>
                </div>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                @isset($footer)
                    <div class="modal-footer ">
                        
                    </div>
                @endisset
            </form>
        </div>
    </div>
</div>