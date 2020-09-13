<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:orders-read'])->only('index');
        $this->middleware(['permission:orders-create'])->only('create');
        $this->middleware(['permission:orders-update'])->only('edit');
        $this->middleware(['permission:orders-delete'])->only('destroy');

    }


    public function index(Request $request){
        $orders = Order::where('statues','Loading')->paginate(8);
            $pageName = 'Loading Order Page';
        $routName = 'Home / Product / Order ';
        return view('Dashboard.order.index',compact('orders' , 'routName' ,'pageName'));
    }

    public function create(){
        $categories = Category::get();
        $pageName = 'Order Page ';
        $routName = 'Home / Order / Add New Order';
        return view('Dashboard.order.create',compact('categories','pageName','routName'));
    }

    public function store(Request $request){
        $totalPrice = 0;
        $order = Order::find($request->order_id);
        foreach ($request->product_id as $i => $product)
        $order->products()->attach($product,['quantity' => $request->quantity[$i]]);
        foreach ($request->product_id as $i => $pro){
            $product = Product::find($pro);
            $product->update([
                'store' => $product->store - $request->quantity[$i]
            ]);
            $totalPrice += ($product->salesPrice * $request->quantity[$i]) ;
        }
        $order->update([
            'totalPrice' => $totalPrice
        ]);

            return redirect()->route('order.index');
    }

    public function update(Request $request,$id){
        $order = Order::find($id);
        $order->statues = 'Prepared';
        $order->save();
        return redirect()->route('order.index');

    }
    public function destroy($id){
      Order::find($id)->delete();
    return redirect()->back();

}


}
