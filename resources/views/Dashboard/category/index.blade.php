@extends('Dashboard.app')
@section('content')
<section class="content">
      <div class="container-fluid">

            <form action="{{route('category.index')}}" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2 w-50"  type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> &nbsp;@lang('site.Search')</button>
                 @if(auth()->user()->hasPermission('categories-create'))
                   <a href="{{route('category.create')}}" class="btn btn-primary ml-3"><i class="fas fa-plus"></i>&nbsp; @lang('site.Add Category')</a>

                 @else
                     <button class="btn btn-primary disabled ml-3"><i class="fas fa-plus"></i>&nbsp;@lang('site.Add Admin')</button>
                 @endif
                </form>

                <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">@lang('site.Show All Category')</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        @if($categories->count() >0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Products</th>
                                    <th>Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $index=>$category)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>

                                            @if(auth()->user()->hasPermission('products-read'))
                                                <form method="get" action="{{route('product.index')}}" style="display:inline-block" class="text-center">
                                                    <input class="form-control mr-sm-2 w-25"  type="hidden" name="search" placeholder="Search" aria-label="Search">
                                                    <input type="hidden" value="{{$category->id}}" name="category_Name">
                                                    <button type="submit" class="btn btn-info btn-sm"> @lang('site.Show all Product')</button>
                                                </form>
                                            @else
                                                <button class="btn btn-info disabled btn-sm"><i class="far fa-trash-alt"></i>&nbsp; @lang('site.Delete')</button>
                                            @endif

                                        </td>

                                        <td>
                                            @if(auth()->user()->hasPermission('categories-update'))
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> &nbsp; @lang('site.Update')</a>
                                            @else
                                                <button  class="btn btn-info disabled btn-sm" ><i class="fas fa-pen"></i> &nbsp;@lang('site.Update')</button>
                                            @endif
                                            @if(auth()->user()->hasPermission('categories-delete'))
                                                <form method="post" action="{{route('category.destroy',$category->id)}}" style="display:inline-block">
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
                            </table>

                        @else
                            <h2> @lang('site.Not Found Record')</h2>
                        @endif
                        <br>
                        {{ $categories->appends(request()->query())->links() }}
                    </div>
                    <!-- /.card-body -->

                    </div>
                            <!-- /.card-body -->
                </div>
     </div>
 </div>
</section>
@endsection
