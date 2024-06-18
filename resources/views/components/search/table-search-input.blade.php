@php
    $type = $type ?? 'text';
    $name = $name ?? '';
    $label = $label ?? '';
    $value = $value ?? '';
    $disabled = $disabled ?? false;
    $placeholder = $placeholder ?? 'Search...';
    $min = $min ?? '';
    $required = $required ?? false;
    $id = $id ?? $name;
    $class = $class ?? '';
    $action = $action ?? '#';
    $method = $method ?? null;
    $btn_type = $btn_type ?? 'submit';
    $btnClass = $btnClass ?? '';
    $catVal = $catVal ?? '';
    $roleName = $roleName ?? '';
@endphp

<div class="mx-2">
    <form action="{{ $action }}" method="{{ $method }}">
        <div class="input-group">
            <input type="{{ $type }}" class="form-control {{ $class }}" id="{{ $id }}"
                name="{{ $name }}" value="{{ $value }}" placeholder="{{ $placeholder }}"
                {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} min="{{ $min }}">
            <input type="hidden" name="{{ $roleName }}" value="{{ $catVal }}">
            <div class="input-group-append">
                <button type="{{ $btn_type }}" class="btn btn-primary {{ $btnClass }}">
                    <i class="fa fa-search"></i>
                </button>
                <a href="{{ $action }}" class="btn btn-danger {{ $btnClass }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </form>
</div>
