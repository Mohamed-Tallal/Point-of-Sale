<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatgoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:categories-read'])->only('index');
        $this->middleware(['permission:categories-create'])->only('create');
        $this->middleware(['permission:categories-update'])->only('edit');
        $this->middleware(['permission:categories-delete'])->only('destroy');
    }

    public function index(Request $request){
            if ($request->search){
                $categories = Category::where('name','like','%'.$request->search.'%')->paginate(5);
            }
       else{
           $categories = Category::paginate(5);
       }
        $pageName = 'Category Page';
        $routName = 'Home  / Category';

        return view('Dashboard.category.index',compact('categories','routName' ,'pageName'));
    }

    public function create(){
        $pageName = 'Category Page';
        $routName = 'Home  / Category /Add New Category';
        return view('Dashboard.category.create',compact('pageName','routName'));
    }

    public function store(CatgoryRequest $request){
        Category::create($request->all());
        return redirect()->route('category.index');
    }

    public function edit($id){
        $pageName = 'Category Page ';
        $routName = 'Home / Category / Edit Category Information';
        $category = Category::findOrFail($id);
        return view('Dashboard.category.edit',compact('category','pageName','routName'));
    }

    public function update(CatgoryRequest $request,$id){
        $categories = Category::findOrFail($id);
        $categories->update($request->all());
        return redirect()->route('category.index');
    }

    public function destroy($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index');
    }
}
