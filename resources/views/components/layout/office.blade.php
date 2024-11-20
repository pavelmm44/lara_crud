@props([
    'title' => 'Office'
])

<x-layout.default :title="$title">

    <div class="row">
        <div class="col-3">
            <x-menus.office />
        </div>
        <div class="col-9">
            {{ $slot }}
        </div>
    </div>

</x-layout.default>
