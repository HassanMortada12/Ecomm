<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DataReceiverController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Create a new order in the database
        $order = Order::create($validated);

        // Respond back to the sender
        return response()->json([
            'message' => 'Order created successfully',
            'order' => $order
        ], 201);
    }
}
