@props([
    'label',
    'name',
    'classes' => 'mb-3',
    'type',
    'value' => null,
    'item' => null,
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
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" class="form-control" id="{{ $id }}" value="{{ $realValue }}">
    <x-form.error name="{{ $name }}" />
</div>
