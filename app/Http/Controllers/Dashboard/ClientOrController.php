<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class ClientOrController extends Controller
{
    public function show($Client_id,Request $request){
        $pageName = 'Order Page';
        $routName = 'Home / Client / Order';
        $categories = Category::get();

        $Client =$Client_id;
        $order = new Order;
        $order->client_id = $Client;
        $order->save();
        $orderId = $order->id;
        return view('Dashboard.order.create',compact('categories','orderId','pageName','routName'));
    }

    public function checkOut($id){
        $order =Order::find($id);
        $totalPrice = $order->totalPrice;
        $orders = $order->products;
        return view('Dashboard.order.show',compact('orders','totalPrice'));
    }


    public function Prepare(){
        $pageName = 'Prepared Order Page';
        $routName = 'Home / Product / Prepared Order';
        $orders = Order::where('statues','Prepared')->paginate(8);
        return view('Dashboard.order.Prepared',compact('orders','pageName','routName'));
    }

}
