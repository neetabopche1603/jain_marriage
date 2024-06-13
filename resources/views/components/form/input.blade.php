@php
    $type = $type ?? 'text';
    $name = $name ?? '';
    $label = $label ?? '';
    $value = $value ?? '';
    $disabled = $disabled ?? false;
    $placeholder = $placeholder ?? '';
    $min = $min ?? '';
    $required = $required ?? false;
    $id = $id ?? $name;
    $class = $class ?? "";
@endphp

<div @if($type == 'hidden') class="position-absolute top-0 start-0" @else class="mb-3" @endif>
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input
        type="{{ $type }}"
        class="form-control {{$class}}"
        id="{{ $id }}"
        value="{{ old($name, $value) }}"
        name="{{ $name }}"
        @if($disabled) disabled @endif
        placeholder="{{ $placeholder }}"
        @if($type == 'date') min="{{ $min }}" @endif
        @if($required) required @endif
    >
    @error($name)
        <div class="text-danger form-text">{{ $message }}</div>
    @enderror
</div>



