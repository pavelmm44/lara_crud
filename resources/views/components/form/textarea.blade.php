@props([
    'label',
    'name',
    'classes' => 'mb-3',
    'value' => null,
    'item' => null,
    'rows' => null
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
    <textarea name="{{ $name }}" class="form-control" id="{{ $id }}" rows="{{ $rows ?? null }}">
        {{ $realValue }}
    </textarea>
    <x-form.error name="{{ $name }}" />
</div>
