@extends('Dashboard.app')

@section('content')

<section class="content">
          <div class="container-fluid">
                <div class="row">
                        <div class="col-md-5">
                                <div class="row">
                                    @foreach($categories as $cat)
                                        <div class="col-md-12">
                                        <div class="card card-primary collapsed-card">
                                            <div class="card-header">
                                                <h3 class="card-title">{{$cat->name}}</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                                <!-- /.card-tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body" style="display: none;">
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Store</th>
                                                            <th>Price</th>
                                                            <th>Add Order</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($cat->products as $product )
                                                                <tr>
                                                                    <td>{{$product->name}}</td>
                                                                    <td>{{$product->store}}</td>
                                                                    <td>{{$product->salesPrice}}</td>
                                                                    <td><a href="" id="product-{{$product->id}}"
                                                                           data-id="{{$product->id}}"
                                                                           data-name="{{$product->name}}"
                                                                           data-price="{{$product->salesPrice}}"
                                                                           class="btn btn-primary btn-sm add-product-btn"> <i class="fas fa-plus"></i> </a> </td>
                                                                </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-6">

                        <div class="card-header">
                            <h3 class="card-title text-center mb-2">Responsive Hover Table</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <form action="{{route('order.store')}}" method="post">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>

                                <tbody class="order-product">

                                </tbody>
                              </table>

                                @csrf
                                <input type="hidden" name="order_id" value="{{$orderId}}">
                                Total Price :  <span class="total-price" style="font-size: 20px;"> 0 </span>
                                <button class="btn btn-primary btn-sm mt-4 w-100 disabled" id="add-order"> Add Order </button>
                            </form>

                        </div>
                    </div>
                </div><!-- /.row -->
          </div><!-- /.container -->
    </section>
@endsection
