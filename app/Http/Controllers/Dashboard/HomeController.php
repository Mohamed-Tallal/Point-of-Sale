<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $pageName = 'Dashboard';
        $routName = 'Home';
        $clients = Client::count();
        $admins = User::count();
        $product = Product::count();
        $category = Category::count();
        $sales_data = Order::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(totalPrice) as sum')
        )->groupBy('month')->get();
        return view('Dashboard.Home',compact('clients','admins','routName','product','category','sales_data','pageName'));
    }
}
