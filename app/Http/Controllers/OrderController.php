<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{

    public function store(Request $request)
    {
        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

}
