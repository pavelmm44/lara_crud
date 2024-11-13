<x-layout.default title="Edit shops configuration">

    <div>
        <div>
            <h2>Product info</h2>
            <p><b>ID</b>: {{ $product->id }}</p>
            <p><b>Brand</b>: {{ $product->brand }}</p>
            <p><b>Model</b>: {{ $product->model }}</p>
            <hr>
        </div>

        <h3>Edit shops configuration</h3>
        <form action="{{ route('products.shops.save', [ $product->id ]) }}" method="post">
            @csrf

            @error('shops')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            @foreach($shops as $shop)

                <div class="mb-3">

                    <label for="shop_{{ $shop->id }}" class="form-label">{{ $shop->title }}</label>

                    <input type="text" name="shops[{{ $shop->id }}]" class="form-control" id="shop_{{ $shop->id }}" value="{{ old('shops.' . $shop->id, $productShops->get($shop->id)) }}">

                    <x-form.error name="{{ 'shops.' . $shop->id }}" />
                    <x-form.error name="{{ 'shops_ids.' . $shop->id }}" />
                </div>

            @endforeach

            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
    <hr>
</x-layout.default>
