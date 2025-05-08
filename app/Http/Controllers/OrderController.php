<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Comanda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'cart' => 'required|array',
            'total' => 'required|numeric'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'cart' => json_encode($request->cart),
            'total' => $request->total
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Compra realizada con éxito',
            'order' => $order
        ]);
    }
}