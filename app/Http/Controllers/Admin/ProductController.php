<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return redirect()->route('productsIndex');
    }

    public function show($id)
    {
        return redirect()->route('productsShow', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;

        if ($product->save()) {
            return response()->json([
                'success' => true,
                'data' => $product->toArray()
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not added'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'integer'
        ]);

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 400);
        }

        $updated = $product->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product can not be updated'
            ], 500);
        }
    }
}
