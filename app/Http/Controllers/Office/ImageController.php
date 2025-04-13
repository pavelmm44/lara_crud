<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
    public function create(string $model, int $id)
    {
        $modelObj = config('imageables')[$model]::findOrFail($id);

        return view('images.create', compact('model', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $model, string $id, ImageRequest $request)
    {
        $model = config('imageables')[$model]::findOrFail($id);

        foreach ($request->image as $image) {

            $img = new Image();
            $img->url = '/storage/' . $image->store('images/' . date('Y') . '/' . date('m'));
            $model->images()->save($img);
        }

        return redirect()
            ->intended(route($model->getTable() . '.edit', $id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
