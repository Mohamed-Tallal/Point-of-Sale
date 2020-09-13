<?php

namespace App\Http\Controllers\Dashboard;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:clients-read'])->only('index');
        $this->middleware(['permission:clients-create'])->only('create');
        $this->middleware(['permission:clients-update'])->only('edit');
        $this->middleware(['permission:clients-delete'])->only('destroy');

    }


    public function index(Request $request){
        if($request->search){
            $clients = Client::where('name','like','%'.$request->search.'%')
           -> orWhere('address','like','%'.$request->search.'%')->paginate('5');
        }else{
            $clients = Client::paginate('5');
        }
        $pageName = 'Client Page';
        $routName = 'Home / Client ';
        return view('Dashboard.client.index',compact('clients','pageName','routName'));
    }


    public function store(ClientRequest $request){
        Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('client.index');

    }

    public function edit($id){
        $clients =Client::findOrFail($id);
        $pageName = 'Client Page ';
        $routName = 'Home / Client / Edit Client Information';
        return view('Dashboard.client.edit',compact('clients','pageName','routName'));
    }

    public function update(ClientRequest $request,$id){
        $clients =Client::findOrFail($id);
        $clients->name = $request->name;
        $clients->phone = $request->phone;
        $clients->address = $request->address;
        $clients->save();
        return redirect()->route('client.index');
    }

    public function create(){
        $pageName = 'Client Page';
        $routName = 'Home  / Client /Add New Client';
        return view('Dashboard.client.create',compact('pageName','routName'));
    }


    public function destroy($id){
        Client::findOrFail($id)->delete();
        return redirect()->route('client.index');
    }

}
