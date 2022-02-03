<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return response()->json([
            'success' => true,
            'data' => $orders
        ], 200);
    }

    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $order->toArray()
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
            'value' => 'required|integer'
        ]);

        $order = new Order();
        $order->value = $request->value;
        $order->user_id = $request->user_id;

        if (auth()->user()->orders()->save($order)) {
            return response()->json([
                'success' => true,
                'data' => $order->toArray()
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Order not added'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'value' => 'integer'
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found'
            ], 400);
        }

        $updated = $order->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Order can not be updated'
            ], 500);
        }
    }
}
