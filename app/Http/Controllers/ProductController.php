<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveShopsProductRequest;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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
            ->map(fn ($item) => [...$item, 'info' => ['price' => $item['price']]])
            ->pluck('info', 'id')
            ->reject(fn ($item) => is_null($item['price']));

        if ($request->isJson()) {
            $product->shops()->detach($validated->keys());
            $product->shops()->attach($validated);

            return true;
        } else {
            $product->shops()->sync($validated);

            return redirect()->route('products.shops', [$product->id])->with('success', 'Shops configuration has been saved');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
