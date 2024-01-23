<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = ProductResource::collection(Product::latest()->paginate(12));
        return Inertia::render("Admin/Products/Index", compact("products"));
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
    public function store(ProductStoreRequest $request)
    {
        if ($request->hasFile("image")) {
            $manager = new ImageManager(new Driver());

            $imageName = date("YmdHis") . "." . $request->file("image")->getClientOriginalExtension();
            $image = $manager->read($request->file("image"));
            $image->cover(800, 800);
            $image->save(base_path("public/images/products/" . $imageName));

            Product::create([
                "name" => $request->name,
                "image" => $imageName
            ]);
        }

        return redirect()->route("product.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
        File::delete(public_path("images/products/" . $product["image"]));
        $product->delete();

        return redirect()->route("product.index");
    }
}
