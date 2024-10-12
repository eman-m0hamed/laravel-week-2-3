<div class="form-group">
    <label class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" class="form-control" accept="{{ isset($accept)? $accept: null }}">
    @error("{{ $name }}")
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
