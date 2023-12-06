<div class="form-group mb-3">
    @isset($label)
        <label for="{{ $field ?? '' }}">{{ $label ?? '' }}</label>
    @endisset
    <input type="{{ $type ?? '' }}" name="{{ $field ?? '' }}"
        value="@isset($value){{ $value }}@else{{ old($field) }}@endisset"
        class="form-control @error($field) is-invalid @enderror" placeholder="{{ $plc ?? '' }}"
        id="{{ $id ?? '' }}">
    @error($field)
        <span class="valid-feedback">{{ $message }}</span>
    @enderror
</div>
