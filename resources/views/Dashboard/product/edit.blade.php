@extends('Dashboard.app')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h5 class="card-header">@lang('site.Update Product')</h5>
                        <div class="card-body">
                            <form method="post" action="{{route('product.update',$products->id)}}" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.name')</label>
                                    <input type="text" name="name" value="{{$products->name}}" class="form-control">
                                    @error('name')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.mainPrice')</label>
                                    <input type="text" name="mainPrice" value="{{$products->mainPrice}}" class="form-control" >
                                    @error('mainPrice')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.salesPrice')</label>
                                    <input type="text" name="salesPrice" value="{{$products->salesPrice}}" class="form-control">
                                    @error('salesPrice')
                                    <small class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.store')</label>
                                    <input type="text" value="{{$products->store}}" name="store" class="form-control">
                                    @error('store')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.image')</label>
                                    <input type="file" name="image" class="form-control" >
                                    @error('image')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">

                                <label for="exampleInputEmail1">@lang('site.Category')</label>
                                    <select class="form-control" name="category_id">
                                        <option value=" ">@lang('site.Select Category') </option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat ->id}}">{{$cat->name}}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">@lang('site.Description')</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$products->description}}"</textarea>
                                    @error('description')
                                    <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
@endsection
