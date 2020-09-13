<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpRequest;
use App\Product;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageTrait;

    public function __construct()
    {
        $this->middleware(['permission:products-read'])->only('index');
        $this->middleware(['permission:products-create'])->only('create');
        $this->middleware(['permission:products-update'])->only('edit');
        $this->middleware(['permission:products-delete'])->only('destroy');

    }

    public function index(Request $request){
        if($request->search){
            if($request->category_Name)
            {
                $products = Product::where('name','like','%'.$request->search.'%','category_id',$request->category_Name)
                    ->paginate(5);
                $pageName = 'Product Page';
                $routName = 'Home / Product ';

            }else{
                $products = Product::where('name','like','%'.$request->search.'%')->paginate(5);
                $pageName = 'Product Page';
                $routName = 'Home / Product ';
            }
        }
        elseif ($request->category_Name){
            $products = Product::where('category_id',$request->category_Name)->paginate(5);
            $pageName = 'Product Page';
            $routName = 'Home / Category / Product ';
        }
      else{
            $products = Product::paginate('5');
              $pageName = 'Product Page';
              $routName = 'Home / Product ';
        }

        $category = Category::get();
        return view('Dashboard.product.index',compact('products','category','pageName' ,'routName'));
    }

    public function create(){
        $pageName = 'Product Page ';
        $routName = 'Home / Product / Add New Product';
        $category = Category::get();
        return view('Dashboard.product.create',compact('category','pageName','routName'));
    }

    public function store(ProductRequest $request){

            $path = public_path('uploads/products');
            $fileName = $this->SaveImage($path ,$request->image);

        Product::create([
            'name' =>$request->name,
            'mainPrice' =>$request->mainPrice,
            'salesPrice' =>$request->salesPrice,
            'store' => $request->store,
            'image' => $fileName,
            'category_id' =>$request->category_id,
            'description' =>$request->description,
        ]);
        return redirect()->route('product.index');
    }

    public function edit($id){
        $pageName = 'Product Page ';
        $routName = 'Home / Product / Edit Product Information';
        $products = Product::findOrFail($id);
        $category = Category::get();
        return view('Dashboard.product.edit',compact('products','category','pageName','routName'));
    }

    public function update(ProductUpRequest $request ,$id){
        $products = Product::findOrFail($id);
        $products->name = $request->name;
        $products->mainPrice = $request->mainPrice ;
        $products->salesPrice = $request->salesPrice;
        $products->store = $request->store;
        $products->category_id =$request->category_id;
        $products->description =$request->description;
        if ($request->image){
            $path = public_path('uploads/products');
            $fileName = $this->SaveImage($path ,$request->image);
            $products->image = $fileName;
        }
        $products->save();
        return redirect()->route('product.index');
    }

    public function destroy($id){
         Product::findOrFail($id)->delete();
        return redirect()->route('product.index');
    }


}
