@extends('Dashboard.app')

@section('content')

<section class="content">
          <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">@lang('site.Add New Client')</h5>
                                    <div class="card-body">
                                            <form method="post" action="{{route('client.store')}}">
                                                     @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.name')</label>
                                                        <input type="text" name="name" class="form-control">
                                                       @error('name')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.phone')</label>
                                                        <input type="number" name="phone" class="form-control">
                                                        @error('phone')
                                                        <small  class="form-text text-muted" style="color:red !important;">{{$message}}.</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">@lang('site.address')</label>
                                                        <input type="text" name="address" class="form-control">
                                                        @error('address')
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
