@props([
    'label',
    'name',
    'classes' => 'mb-3',
    'value' => null,
    'item' => null,
    'checked' => false
])

@php
    $id = $name . '_' . microtime(true) . '_' . mt_rand(0, 1_000_000);

    $realValue = ($value === null)
                    ? (old($name) === null)
                        ? ($item === null)
                            ? null
                            : $item->$name
                        : old($name)
                    : $value;
@endphp

<div class="{{ $classes }}">
    <input type="checkbox" name="{{ $name }}" class="form-check-input" id="{{ $id }}" {{ $realValue ? 'checked' : '' }}>
    <label for="{{ $id }}" class="form-check-label">{{ $label }}</label>
</div>
