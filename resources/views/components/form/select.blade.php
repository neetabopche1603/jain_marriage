{{-- @props(['name', 'label', 'options', 'required' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}{{ $required ? '*' : '' }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-select">
        <option value="">-Select {{ strtolower($label) }}-</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ old($name) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
    <span class="text-danger">
        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </span>
</div> --}}


@props(['name', 'label', 'options', 'required' => false, 'selected' => null, 'selectClass' => ''])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}{{ $required ? '*' : '' }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-select {{ $selectClass }}">
        <option value="">-Select {{ strtolower($label) }}-</option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ (old($name) ?? $selected) == $value ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
    <span class="text-danger">
        @error($name)
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </span>
</div>
