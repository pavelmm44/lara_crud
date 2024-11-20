<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsShopsPriceRequest;
use App\Http\Requests\SaveShopsProductRequest;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function editShops(Product $product)
    {
        $shops = Shop::all();

        $productShops = $product->shops->map(function ($item) {
            return [
                'id' => $item->id,
                'price' => $item->productPrice
            ];
        })->pluck('price', 'id');

        return view('products/edit-shops', compact('shops', 'productShops', 'product'));
    }

    public function saveShops(SaveShopsProductRequest $request, Product $product)
    {
        $validated = collect($request->validated('shops'));
        $validated = $validated
            ->map(fn($item) => [...$item, 'info' => ['price' => $item['price']]])
            ->pluck('info', 'id')
            ->reject(fn($item) => is_null($item['price']));

        if ($request->isJson()) {
            $product->shops()->detach($validated->keys());
            $product->shops()->attach($validated);

            return true;
        } else {
            $product->shops()->sync($validated);

            return redirect()->route('products.shops', [$product->id])->with('success', 'Shops configuration has been saved');
        }
    }

    public function getShopsPrice(Product $product)
    {
        return $product->shops()
            ->orderBy('price')
            ->get();
    }

    public function getProductsShopsPrice(ProductsShopsPriceRequest $request)
    {
        $res = Product::with(['shops' => function (BelongsToMany $query) {
                $query->orderBy('price');
            }])
            ->whereIn('id', $request->validated('products'))
            ->get();

        return $res;
    }

    public function getBestPriceProducts()
    {
        $products = DB::select("
        SELECT product_id,
           (MIN(price) /
            (SELECT price FROM product_shop WHERE product_id = ps.product_id ORDER BY price LIMIT 1, 1)) AS coef
            FROM product_shop ps
            GROUP BY product_id
            HAVING
                    coef < 0.95
            ORDER BY coef
        ");

        return $products;
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
