<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|integer'
        ]);

        $order = new Order();
        $order->value = $request->value;

        $order->user_id = 1;

        $order->save();

        if (auth()->user()->orders()->save($order)) {
            return response()->json([
                'success' => true,
                'data' => $order->toArray()
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not added'
            ], 500);
        }
    }

}
