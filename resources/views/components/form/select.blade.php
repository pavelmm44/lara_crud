@props([
    'label',
    'classes' => 'mb-3',
    'name',
    'item' => null,
    'value' => null,
    'data',
    'multiple' => false
])

@php
    $id = $name . '_' . microtime(true) . '_' . mt_rand(0, 1_000_000);

    $realValue = ($value === null)
                    ? (old($name) === null)
                        ? ($item === null)
                            ? ($multiple)
                                ? []
                                : null
                            : $item->$name
                        : old($name)
                    : $value;

    if ($multiple && $value === null && old($name) === null && $item !== null) {
        $realValue = $item->$name->pluck('id')->toArray();
    }
@endphp

<div class="{{ $classes }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select class="form-control" name="{{ $multiple ? $name . '[]' : $name }}" id="{{ $id }}" {{ $multiple ? 'multiple' : '' }}>
        @if(!$item && !$multiple)
            <option selected disabled>Select category</option>
        @endif
        @foreach($data as $k => $v)
            <option value="{{ $k }}" {{ $multiple ? (in_array($k, $realValue) ? 'selected' : '') : (($k == $realValue) ? 'selected' : '') }}>{{ $v }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>

    @if($multiple)
        @foreach($data as $k => $v)
            <x-form.error name="{{ $name . '.' . $loop->index }}"/>
        @endforeach
    @endif
</div>
