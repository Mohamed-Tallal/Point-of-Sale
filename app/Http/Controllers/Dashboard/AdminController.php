<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\User;
use phpDocumentor\Reflection\Types\Null_;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:users-read'])->only('index');
        $this->middleware(['permission:users-create'])->only('create');
        $this->middleware(['permission:users-update'])->only('edit');
        $this->middleware(['permission:users-delete'])->only('destroy');

    }

    public function index(Request $request){
            $users = User::whereRoleIs('admin')->when($request->search,function($q) use($request){
                    return $q->where('first_name','like','%'.$request->search .'%');
            })->paginate(10);
        $pageName = 'Admin Page ';
        $routName = 'Home / Admin';

            return view('Dashboard.admin.index',compact('users','pageName','routName'));
        }

        public function create(){
            $pageName = 'Admin Page ';
            $routName = 'Home / Admin / Add New Admin';
            return view('Dashboard.admin.create',compact('pageName','routName'));
        }

        public function store(AdminRequest $request){
                if($request->password != $request->confirm){
                    return redirect()->route('admin.create')->with(['Dont' => 'site.ddd']);
                }
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                $user->attachRole('admin');
               $user->syncPermissions($request->permissions);
            return redirect()->route('admin.index');
        }

            public function edit($id){
                $pageName = 'Admin Page ';
                $routName = 'Home / Admin / Edit Admin Information';
                $user = User::findOrFail($id);
                return view('Dashboard.admin.edit',compact('user','pageName','routName'));
            }

            public function update(Request $request,$id){
                $user = User::findOrFail($id);
                if($request->password == NULL && $request->confirm == NULL){
                    $user->first_name = $request->first_name;
                    $user->last_name  = $request->last_name;
                    $user->email =  $request->email;
                    $user->update();
                    $user->syncPermissions($request->permissions);
                }else if($request->password != $request->confirm ){
                    return redirect()->route('admin.create')->with(['Dont' => 'site.ddd']);
                }else{
                    $user->first_name = $request->first_name;
                    $user->last_name  = $request->last_name;
                    $user->email =  $request->email;
                    $user->last_name  = bcrypt($request->password);
                    $user->update();
                    $user->syncPermissions($request->permissions);
                }
                return redirect()->route('admin.index');
            }


            public function destroy($id){
                    User::findOrFail($id)->delete();
                    return redirect()->route('admin.index');
            }
}
