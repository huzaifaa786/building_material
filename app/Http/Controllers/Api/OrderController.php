<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'vendor_id' => $request->vendor_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        foreach (json_decode($request['items']) as $item) {
            OrderItem::create([
                'product_id' => $item->id,
                'order_id' => $order->id,
                'qty' => 1,
            ]);
        }

        return Api::setResponse('order', $order);
    }

    public function orderHistory(Request $request)
    {
        $orders = Order::where('user_id', Auth::user()->id)->with('vendor')->with('user')->with('items')->get();
        return Api::setResponse('orders', $orders);
    }
}
