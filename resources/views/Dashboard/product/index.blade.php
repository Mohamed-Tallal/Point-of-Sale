@extends('Dashboard.app')
@section('content')
<section class="content">
      <div class="container-fluid">

            <form action="{{route('product.index')}}" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 w-25"  type="search" name="search" placeholder="Search" aria-label="Search">
                        <select class="form-control mr-sm-2 w-25" name="category_Name">
                            <option value="">Select Category </option>
                            @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                      <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> &nbsp;@lang('site.Search')</button>
                 @if(auth()->user()->hasPermission('products-create'))
                   <a href="{{route('product.create')}}" class="btn btn-primary ml-3"><i class="fas fa-plus"></i>&nbsp; @lang('site.Add New Product')</a>

                 @else
                     <button class="btn btn-primary disabled ml-3"><i class="fas fa-plus"></i>&nbsp;@lang('site.Add Product')</button>
                 @endif
                </form>

                <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">@lang('site.Show All Product')</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                        <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Store</th>
                                    <th>Gain</th>
                                    <th>Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $index=>$product)
                            <tr>
                                    <td>{{$index +1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td class="text-center"><img src="{{asset('uploads/products/'.$product->image)}}" height="100"> </td>
                                    <td>{{$product->mainPrice}} $</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->store}}</td>
                                    <td>{{$product->salesPrice - $product->mainPrice}} $</td>

                                <td>
                                        @if(auth()->user()->hasPermission('products-update'))
                                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> &nbsp; @lang('site.Update')</a>
                                        @else
                                            <button  class="btn btn-info disabled btn-sm" ><i class="fas fa-pen"></i> &nbsp;@lang('site.Update')</button>
                                        @endif
                                            @if(auth()->user()->hasPermission('products-delete'))
                                                <form method="post" action="{{route('product.destroy',$product->id)}}" style="display:inline-block">
                                                    {{csrf_field()}}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>&nbsp; @lang('site.Delete')</button>
                                                </form>
                                            @else
                                                <button class="btn btn-danger disabled btn-sm"><i class="far fa-trash-alt"></i>&nbsp; @lang('site.Delete')</button>
                                            @endif
                                    </td>
                            </tr>
                                    @endforeach
                        </tbody>
                            {{ $products->appends(request()->query())->links() }}
                        </table>
                    </div>
                    <!-- /.card-body -->

                    </div>
                            <!-- /.card-body -->
                </div>
     </div>
 </div>
</section>
@endsection
