@props([
    'label',
    'name',
    'classes' => 'mb-3',
    'type' => 'text',
    'value' => null,
    'item' => null,
    'is_array' => false,
    'multiple_files' => false
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
    <input type="{{ $type }}" name="{{ $is_array ? $name . '[]' : $name}}" class="form-control" id="{{ $id }}" value="{{ $realValue }}" {{ $multiple_files ? 'multiple' : '' }}>

    @if($is_array)
        @foreach($errors->get($name . '*') as $items)
            <div class="text-danger">
                @foreach($items as $item)
                    {{ $item }}
                @endforeach
            </div>
        @endforeach
    @else
        <x-form.error name="{{ $name }}" />
    @endif
</div>
