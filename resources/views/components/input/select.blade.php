<div class="form-group mb-3">
    @isset($label)
        <label for="{{ $field ?? '' }}">{{ $label ?? '' }}</label>
    @endisset
    <select name="{{ $field ?? '' }}" id="{{ $id ?? '' }}"
        class="form-select form-control @error($field) is-invalid @enderror">
        <option value="">Pilih</option>
        {{ $slot }}
    </select>
    @error($field)
        <span class="valid-feedback">{{ $message }}</span>
    @enderror
</div>
