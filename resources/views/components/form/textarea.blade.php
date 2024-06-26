@props(['name', 'label', 'rows' => 3, 'value' => null])

<div class="mb-3">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" class="form-control" rows="{{ $rows }}" name="{{ $name }}">{{ old($name, $value) }}</textarea>
    @error($name)
        <div class="text-danger form-text">{{ $message }}</div>
    @enderror
</div>