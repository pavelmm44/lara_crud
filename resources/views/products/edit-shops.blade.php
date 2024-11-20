<x-layout.office title="Edit shops configuration">

    <div>
        <div>
            <h2>Product info</h2>
            <p><b>ID</b>: {{ $product->id }}</p>
            <p><b>Brand</b>: {{ $product->brand }}</p>
            <p><b>Model</b>: {{ $product->model }}</p>
            <hr>
        </div>

        <h3>Edit shops configuration</h3>
        <form action="{{ route('products.shops', [ $product->id ]) }}" method="post">
            @csrf

            @error('shops')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <table class="table table-bordered">
                <tr>
                    <td>Shop</td>
                    <td>Price</td>
                </tr>
                @foreach($shops as $shop)
                    <tr>
                        <td>{{ $shop->title }}</td>
                        <td>
                            <input type="hidden" name="shops[{{ $loop->index }}][id]" value="{{ $shop->id }}">

                            <input type="text" name="shops[{{ $loop->index }}][price]" class="form-control" value="{{ old('shops.' . $loop->index . '.price', $productShops->get($shop->id)) }}">

                            <x-form.error name="{{ 'shops.' . $loop->index . '.price' }}" />
                            <x-form.error name="{{ 'shops.' . $loop->index . '.id' }}" />
                        </td>
                    </tr>
                @endforeach

            </table>

            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </form>
    </div>
    <hr>
</x-layout.office>
