@props([
    'label',
    'classes' => 'mb-3',
    'name',
    'item' => null,
    'data'
])

@php
    $id = $name . '_' . microtime(true) . '_' . mt_rand(0, 1_000_000);

    $realValue = (old($name) === null)
                    ? ($item === null)
                        ? null
                        : $item->$name
                    : old($name);
@endphp

<div class="{{ $classes }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select class="form-control" name="{{ $name }}" id="{{ $id }}">
        @if(!$item)
            <option selected disabled>Select category</option>
        @endif
        @foreach($data as $k => $v)
            <option value="{{ $k }}" {{ ($k == $realValue) ? 'selected' : '' }}>{{ $v }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>
</div>
